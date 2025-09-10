<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name','description'];

    public function Posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    

}

