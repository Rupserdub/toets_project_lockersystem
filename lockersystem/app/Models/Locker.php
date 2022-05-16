<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    // which table to connect with:
    protected $table = 'lockers';

    // dont try to input created_at and updated_at columns in table
    public $timestamps = false;


}
