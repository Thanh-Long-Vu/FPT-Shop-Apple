<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'payment_method';
    protected $primaryKey = 'id_payment_method';
    protected $fillable = [
        'name'
    ];
    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction','id_payment_method','pay_id');
    }
}
