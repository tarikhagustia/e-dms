<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['title', 'category_id', 'secure_id', 'file_location', 'user_id', 'description'];
    protected $hidden = ['secure_id'];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }
}
