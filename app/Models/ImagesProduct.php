<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagesProduct extends Model
{
    use HasFactory;
    protected $table = 'image_product';
    protected $primaryKey = 'id_image_product';

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id_product');
    }
}
