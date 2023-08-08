<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModels extends Model
{
    protected $table ='vp_categories';
    protected $primaryKey = 'cate_id';
    protected $guarded = []; 
}
