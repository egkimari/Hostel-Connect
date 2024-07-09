<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_number',
        'department',
    ];

    // Define inverse polymorphic relationship
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
