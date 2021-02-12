<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniqueUser extends Model
{
    protected $fillable= ['user_ip'];
    use HasFactory;
}
