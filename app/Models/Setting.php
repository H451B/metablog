<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo', 'home_banner', 'short_description', 'contacts',
    ];

    protected $casts = [
        'contacts' => 'array',
    ];
}
