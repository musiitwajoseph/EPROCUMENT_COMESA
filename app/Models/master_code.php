<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_code extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'master_code';
}
