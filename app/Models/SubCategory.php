<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'sub_category_id';
    protected $fillable = [
        'sub_category_name',
    ];

    public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

}
