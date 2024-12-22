<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clearance extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'purpose', 'status', 'release_date', 'user_email'];
// In Clearance.php model
public function user()
{
    return $this->belongsTo(User::class);
}

}

