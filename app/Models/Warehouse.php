<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Config\Traits\Scopes\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory,
    Filterable,
    SoftDeletes;

    protected $table = 'warehouse';
    protected $primaryKey = 'id_warehouse';

    public function product()
    {
        return $this->hasOne('App\Models\Product','warehouse_id','id_warehouse');
    }
}
