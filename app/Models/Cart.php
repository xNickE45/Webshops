<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart'; // Specify the table name

    protected $fillable = [
        'user_id', 'console_id', 'amount'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'console_id');
    }
}
