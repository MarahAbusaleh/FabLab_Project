<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    protected $table = 'home_contents';

    protected $fillable = [
        'header',
        'description',
        'image1',
        'image2',
        'image3',
    ];
}
