<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id', // Add user_id to the fillable array
        'phone',
        // 'address1',
        // 'address2',
        // 'suburb',
        // 'city',
        // 'province',
        // 'postal',
        // 'user_type',
    ];

    // Define the inverse relationship: each profile belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

