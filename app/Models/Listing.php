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
        'image1',  // New field for first image
        'image2',  // New field for second image
        'image3',  // New field for third image
        'image4',  // New field for fourth image
        'image5',  // New field for fifth image
        'image6',  // New field for sixth image
    ];

    protected $casts = [
        'amenities' => 'array', // Cast amenities as an array, no need to cast images
    ];
}
