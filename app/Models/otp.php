<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otp extends Model
{
    use HasFactory;


    protected $fillable = ['supplier_name','telephone','email','otp_token','status'];

}
