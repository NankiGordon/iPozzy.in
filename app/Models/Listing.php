<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'property_name',
        'property_type',
        'description',
        'bedrooms',
        'bathrooms',
        'size',
        'amenities',
        'address1',
        'address2',
        'suburb',
        'city',
        'province',
        'postal',
        'available_date',
        'price',
        'images'
    ];
    protected $casts = [
        'amenities' => 'array',
        'images' => 'array', // Make sure images are stored as an array
    ];
}
