<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViberUser extends Model
{
    protected $fillable = ['name', 'token'];
}
