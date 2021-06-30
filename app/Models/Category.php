<?php

namespace App\Models;

use App\Modules\Config\Traits\Scopes\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,
    Filterable,
    SoftDeletes;

    protected $table = 'category';
    protected $primaryKey = 'id_category';
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'title',
        'active'
    ];

    public function productTypes()
    {
        return $this->hasMany('App\Models\ProductType','category_id','id_category');
    }
}
