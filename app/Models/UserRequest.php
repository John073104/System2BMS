<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    protected $fillable = ['user_id', 'type', 'details', 'status']; // Ensure these fields are fillable
}


