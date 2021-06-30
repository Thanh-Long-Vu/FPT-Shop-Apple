<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\Config\Traits\Scopes\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,
    Filterable,
    SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'price',
        'product_type_id',
        'discount'
    ];

    /**
     * scopeActive
     *
     * @param $query
     * @param string $scope
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query, $scope = 'where')
    {
        return $query->$scope('active', 1);
    }

    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType','product_type_id','id_product_type');
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction','order','transaction_id','product_id')->withTimestamps();
    }
    public function order()
    {
        return $this->hasMany('App\Models\Orders','product_id','id_product');
    }
    public function warehouse()
    {
        return $this->belongsTo('App\Models\Warehouse','warehouse_id','id_warehouse');
    }
    function rating()
    {
        return $this->hasMany('App\Models\Rating','product_id','id_product');
    }
    public function imageproduct()
    {
        return $this->hasMany('App\Models\ImagesProduct','product_id','id_product');
    }
}
