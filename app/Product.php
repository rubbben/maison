<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'size', 'category_id', 'status', 'code', 'reference', 'url_image'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
