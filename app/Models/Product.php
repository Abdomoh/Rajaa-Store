<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'name',
        'category_id',
        'quantity',
        'price',
        'description',
        'img1',
        'img2',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
   

    
}
