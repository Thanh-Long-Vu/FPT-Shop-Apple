<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Config\Traits\Scopes\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory,
    Filterable;
    // SoftDeletes;

    protected $casts = [
        'addtional_data' => 'array',
    ];
    protected $guarded = [];
    protected $table = 'transaction';
    protected $primaryKey = 'id_transaction';
    protected $fillable = [
        'name',
        'total_price',
        'note',
        'method_receive',
        'phone',
        'status',
        'addtional_data',
        'payment_method_id',
        'user_id'
    ];
    public function product(){
        return $this->belongsToMany('App\Models\Product', 'order','transaction_id','product_id')->withTimestamps();
    }
    public function order()
    {
        return $this->hasMany('App\Models\Orders','transaction_id','id_transaction');
    }
    function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id_user');
    }
    function guest()
    {
        return $this->belongsTo('App\Models\Guest','guest_id','id_guest');
    }
    function payment_method()
    {
        return $this->belongsTo('App\Models\PaymentMethod','payment_method_id','id_payment_method');
    }
    public function rating(){
        return $this->hasMany('App\Models\Rating', 'transaction_id','id_transaction');
    }
}
