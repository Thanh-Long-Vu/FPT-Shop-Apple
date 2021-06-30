<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Config\Traits\Scopes\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, Filterable;
    protected $table = 'blogs';
    protected $primaryKey = 'id_blog';
}
