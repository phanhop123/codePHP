<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commet extends Model
{
    protected $table ='vp_commet';
    protected $primaryKey = 'com_id';
    protected $guarded = []; 
}
