<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailImages extends Model
{
    use HasFactory;
    protected $table = "detail_images";
    protected $fillable = [
        'image_url',
        'product_id',
    ];
}
