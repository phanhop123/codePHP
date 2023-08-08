<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Cart;


class Product extends Model
{
    protected $table ='vp_products';
    protected $primaryKey = 'prod_id';
    protected $guarded = [];
}
