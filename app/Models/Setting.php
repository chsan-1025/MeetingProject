<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = array(
        'name', 'email', 'phone', 'city', 'state', 'zipcode', 'address', 'about_us', 'facebook', 'instagram',
        'youtube', 'whatsapp', 'tiktok', 'snack', 'header_logo', 'footer_logo', 'map', 'currency',
        'shipping','advance_charges', 'website','advertising','footer_description'
    );

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zipcode' => 'string',
        'address' => 'string',
        'about_us' => 'string',
        'facebook' => 'string',
        'youtube' => 'string',
        'whatsapp' => 'string',
        'instagram' => 'string',
        'tiktok' => 'string',
        'snack' => 'string',
        'header_logo' => 'string',
        'footer_logo' => 'string',
        'map' => 'string',
        'currency' => 'string',
        'shipping' => 'float',
        'advance_charges' => 'float',
        'website' => 'string',
        'advertising' => 'string',
        'footer_description'=> 'string',
    ];
}
