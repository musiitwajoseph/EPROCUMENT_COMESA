<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_previledge extends Model
{
    use HasFactory;

    protected $fillable = ['user_user_id','previledge_name'];
}
