<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable= [ 
        'category_id','sub_category_id','title','author',
        'description','price','rating','front_cover_url','back_cover_url'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
