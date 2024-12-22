<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'place_of_birth',
        'age',
        'gender',
        'civil_status',
        'purok',
        'four_ps_beneficiary',
        'nationality',
        'national_id',
        'address',
        'email',
        'image_path',
    ];
}