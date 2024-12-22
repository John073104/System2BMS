<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    // Add fields you want to allow mass assignment
    protected $fillable = ['name', 'role', 'contact'];
}
