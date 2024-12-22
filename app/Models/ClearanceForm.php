<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearanceForm extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'purpose', 'status'];
    
    // You can also define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
