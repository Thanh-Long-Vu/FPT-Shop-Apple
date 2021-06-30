<?php

namespace App\Modules\Config\Traits\Scopes;

use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Modules\Config\Traits\Scopes\AllowTildeInput;

trait Filterable
{
    use AllowTildeInput;
    /**
     * Generic filterable scope
     *
     * @param $query
     * @param $filters
     * @return mixed
     */
    public function scopeFilterable($query, $filters)
    {
        if (empty($filters) || count($filters) == 0) {
            return $query;
        }

        /**
         * Filters will be sent in as an array
         * e.g. role:id=1,2,3 or is_published=1
         */

        foreach ($filters as $key => $value) {
            if (empty($value)) {
                continue;
            }

            $parameters = explode(':', $key); //parameters will be taken in and broken up into its constituents

            /**
             * in the case that a filter has parameters that are nested values
             * i.e. role:id meaning role table, id column parameters will be > 1
             * else parameters will be exactly 1 which represents a native column of the model
             * e.g. is_published=1
             *  */
            if (sizeof($parameters) > 1) {
                $classObject = new static();
                $this->nestedQuery($query, $classObject, $parameters, $value);
            } else {
                /**
                 * Updated 29th June 2020
                 * Allows "|" to be passed in as part of the params to perform "orWhere" query
                 * e.g. ?id|licence_plate_number=1
                 *      will generate "where(id IN (1) OR licence_plate_number IN (1))"
                 */
                $query->where(function ($query) use ($key, $value) {
                    $compositeKeys = explode('|', $key);
                    foreach ($compositeKeys as $key) {
                        /**
                         * Updated 29th June 2020
                         * Updated so that WHERE LIKE search can be performed
                         * e.g. ?licence_plate_number~=SMC
                         *      then it will search using "WHERE licence_plate_number LIKE "%SMC%"
                         * NOTE: it does not support multiple search using values separated by ',' (e.g. '1,2,3')
                         *       and we shouldn't allow that as it will have impact performance
                         */
                        if ($this->endsWithTilde($key)) {
                            $query = $this->queryOrWhereLike($query, $key, $value);
                            continue;
                        }

                        /**
                         * no additional parameters found
                         * i.e. it's a native column
                         * for boolean columns, frontend must send in =true or =false
                         * quickfilters are moved to api controllers to formulate filter array
                         * location moved to api controller to formulate filter array
                         */

                        if ($value === 'null') {
                            $query = $query->orWhereNull($key, $value);
                            continue;
                        }

                        if ($value === "true") {
                            $value = true;
                        }

                        if ($value === "false") {
                            $value = false;
                        }

                        $values = $value;

                        if (!is_array($value)) {
                            $values = explode(",", $value);
                        }

                        $query = $query->orWhereIn($key, $values);
                    }
                });
                continue;
            }
        }

        return $query;
    }

    /**
     * Perform a where like query
     *
     * @param      Builder   $query  The query
     * @param      string   $key    The key
     * @param      string   $value  The value
     *
     * @return     Builder
     */
    private function queryOrWhereLike(Builder $query, string $key, string $value): Builder
    {
        $key = $this->stripTrailingTilde($key);

        return $query->orWhere($key, 'LIKE', '%' . $value . '%');
    }

    /**
     * Perform nested query
     *
     * @param      Builder   $query        The query
     * @param      mixed     $classObject  The class object
     * @param      array     $parameters   The parameters
     * @param      string    $value        The value
     *
     * @return     Builder
     */
    private function nestedQuery(Builder $query, $classObject, array $parameters, string $value)
    {
        if (count($parameters) === 0) {
            return $query;
        }
        /**
         * establish certain custom rules here like role which is a special derivative
         * and not a relationship for models like users
         */
        if ($parameters[0] === "role") {
            $query = $query->whereHas('groups', function ($query) use ($value, $parameters) {
                $values = explode(",", $value); //since we use whereIn, explode for array
                $query->whereIn('role_id', $values);
            });
            return $query;
        }

        /**
         * establish certain custom rules here like role which is a special derivative
         * and not a relationship for models like users
         */
        if ($parameters[0] === "groups") {
            $query = $query->whereHas('groups', function ($query) use ($value, $parameters) {
                $relationshipKey = $parameters[1] ?? 'id';
                $values          = explode(",", $value); //since we use whereIn, explode for array
                $query->whereIn($relationshipKey, $values);
            });
            return $query;
        }

        /**
         * for parameters with > 1 there could be 2 cases
         * 1) when the filter is for a json column like additional_data
         *      i.e. additional_data:device_os=ios
         * 2) when the filter is for a relationship like country
         *      i.e. country:country_code=SG
         *
         * we will check by using modelHasColumn and modelHasRelation which
         * would return true if a column is found
         */

        /**
         * for relationship parameters,
         * we will get the relationName via the method
         * and filter via the whereHas method and pass in the parameters with the value
         * as of now, we will assume that filter by relationship will only support native columns
         * to support relationship for relationship, we will need to make this method recursive
         */
        $relationshipName = $parameters[0];
        if ($classObject->modelHasRelation($relationshipName)) {
            array_shift($parameters);
            // check the relationship, use whereHasMorhp for MorphTo relationship
            if (is_a($query->getModel()->{$relationshipName}(), MorphTo::class)) {
                // TODO: update this to allow query in polymorphic conditions such as ticket->owner->group
                // $relatedClassObject = $classObject->$relationshipName()->getRelated();
                $query = $query->whereHasMorph($relationshipName, '*', function ($query) use ($value, $parameters) {
                    $compositeKeys = explode('|', $parameters[0]);

                    foreach ($compositeKeys as $key) {
                        $columnName = $this->stripTrailingTilde($key);
                        /**
                         * Updated 29th June 2020
                         * Updated so that WHERE LIKE search can be performed
                         * e.g. ?inventories.licence_plate_number~=SMC
                         *      then it will search using "WHERE inventories.licence_plate_number LIKE "%SMC%"
                         * NOTE: it does not support multiple search using values separated by ',' (e.g. '1,2,3')
                         *       and we shouldn't allow that as it will have impact performance
                         */
                        if ($this->endsWithTilde($key)) {
                            $query = $query->where($columnName, 'LIKE', '%' . $value . '%');
                            continue;
                        }

                        if ($value === 'null') {
                            $query->whereNull($key);
                        }

                        if ($value === "true") {
                            $value = true;
                        }

                        if ($value === "false") {
                            $value = false;
                        }

                        $values = explode(',', $value);
                        $query->whereIn($key, $values);
                    }
                });
            } else {
                $relatedClassObject = $classObject->$relationshipName()->getRelated();
                $query              = $query->whereHas($relationshipName, function ($query) use ($relatedClassObject, $value, $parameters) {
                    $query = $this->nestedQuery($query, $relatedClassObject, $parameters, $value);
                });
            }

            return $query;
        }

        /***********/
        /* columns */
        /***********/
        // NOTE: the subquery is needed as the query may contains "OR" statement
        $query = $query->where(function ($query) use ($classObject, $parameters, $value) {
            $compositeKeys = explode('|', $parameters[0]);
            /**
             * Update: 18th Nov 2019
             * For relationships, there is a condition where 2 columns must exist at the same time (AND condition)
             * hence a new operator ^ is introduced, in the case where the ^ operator is seen, the
             * values are further broken up
             * e.g. tickets?id=1^status_id=2,3,4
             *      => query tickets with id = 1 and status_id in (2,3,4)
             */
            $compositeParameters    = explode('^', $value);
            $hasCompositeParameters = false;
            if (sizeof($compositeParameters) > 1 && !empty($compositeParameters[1])) {
                /**
                 * In the case AND is found in the value that means that is a composite
                 */
                $hasCompositeParameters = true;
                $value                  = $compositeParameters[0];

                $compositeParameters = explode('=', $compositeParameters[1]);

                if (sizeof($compositeParameters) < 1) {
                    $hasCompositeParameters = false;
                }
            }

            foreach ($compositeKeys as $key) {
                $columnName = $this->stripTrailingTilde($key);
                // JSON type
                if ($classObject->getColumnType($columnName) === 'json') {
                    /**
                     * if its null, use whereNull
                     */
                    if ($value === 'null') {
                        $query = $query->whereNull("$parameters[0]->$parameters[1]");
                        return $query;
                    }

                    /**
                     * search or where for json columns
                     *
                     * ?tickets?additional_data:make|car_plate_number~=XYZ95
                     * */
                    if ($this->endsWithTilde($parameters[1])) {
                        $compositeKeysInJson = explode('|', $parameters[1]);

                        foreach ($compositeKeysInJson as $jsonKey) {
                            $val = $this->stripTrailingTilde($jsonKey);
                            $query->orWhere(DB::Raw("JSON_UNQUOTE(LOWER($parameters[0]->'$.$val'))"), 'LIKE', '%' . strtolower($value) . '%');
                        }
                        return;
                    }

                    /**
                     * for json columns true and 1 is used interchangably by laravel
                     * so we will need to filter for whereIn('true', '1')
                     *
                     * for false values we will have to add whereNull as well since not all values are set by default
                     * and whereIn('false', '0') and whereNull()
                     * */

                    $falseValues = ['false', '0'];
                    $trueValues  = ['true', '1'];

                    if ($value == "false") {
                        $query = $query->where(function ($query) use ($parameters, $falseValues) {
                            $query->whereIn("$parameters[0]->$parameters[1]", $falseValues)
                                ->orWhereNull("$parameters[0]->$parameters[1]");
                        });
                        return $query;
                    }

                    if ($value == "true") {
                        $query = $query->whereIn("$parameters[0]->$parameters[1]", $trueValues);
                        return $query;
                    }

                    $values = explode(",", $value);
                    $query  = $query->whereIn("$parameters[0]->$parameters[1]", $values);

                    return $query;
                } else {
                    /**
                     * Updated 29th June 2020
                     * Updated so that WHERE LIKE search can be performed
                     * e.g. ?inventories.licence_plate_number~=SMC
                     *      then it will search using "WHERE inventories.licence_plate_number LIKE "%SMC%"
                     * NOTE: it does not support multiple search using values separated by ',' (e.g. '1,2,3')
                     *       and we shouldn't allow that as it will have impact performance
                     */
                    if ($this->endsWithTilde($key)) {
                        $query = $this->queryOrWhereLike($query, $key, $value);
                        return;
                    }

                    if ($value === 'null') {
                        $query->orWhereNull($key);
                    }

                    if ($value === "true") {
                        $value = true;
                    }

                    if ($value === "false") {
                        $value = false;
                    }

                    $values = explode(',', $value);
                    $query->orWhereIn($key, $values);

                    if ($hasCompositeParameters) {
                        $values = explode(',', $compositeParameters[1]);
                        $query->whereIn($compositeParameters[0], $values);
                    }
                }
            }
        });

        return $query;
    }
}
