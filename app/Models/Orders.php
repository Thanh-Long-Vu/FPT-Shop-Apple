<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Config\Traits\Scopes\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory,
    Filterable;

    protected $table = 'order';
    protected $primaryKey = 'id_order';
    protected $fillable = [
        'quantity',
        'transaction_id',
        'product_id',
        'created_at',
        'updated_at'
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id_product');
    }
    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction','transaction_id','id_transaction');
    }
}
