<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'consoles'; // Specify the correct table name

    protected $fillable = [
        'name', 'description', 'price', 'image_url', 'amount'
    ];

}
