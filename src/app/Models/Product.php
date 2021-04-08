<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'category_id'
    ];

    /**
     * Relations
     */
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
