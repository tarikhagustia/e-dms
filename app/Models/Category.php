<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    public function getParentName()
    {
        if ($this->parent_id == 0)
            return "-";
        $cat = Category::find($this->parent_id);
        return ($cat) ? $cat->name : "-";
    }
}
