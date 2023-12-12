<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photos extends Model
{
    use HasFactory;

    protected $table = 'photo_database';
    protected $fillable = ['title', 'description', 'location', 'uploadedPhoto'];
}
