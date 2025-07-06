<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'body', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cats()
    {
        return $this->belongsToMany(Cat::class)->withTimestamps();
    }
}
