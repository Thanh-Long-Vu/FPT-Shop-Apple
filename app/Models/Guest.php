<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_guest';
    protected $table = 'guest';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];
    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction','transaction_id','id_transaction');
    }
}
