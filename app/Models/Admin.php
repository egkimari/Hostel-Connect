<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // Define the fillable attributes if any
    protected $fillable = [
        // Add your admin-specific attributes here
    ];

    // Define any relationships here, for example:
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
