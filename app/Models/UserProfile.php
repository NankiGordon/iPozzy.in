<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'address1',
        'address2',
        'suburb',
        'city',
        'province',
        'postal',
        'user_type',
    ];
}
