<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    function products() {
        return $this->belongsToMany('App\Models\Product', 'product_categories', 'category_id', 'product_id');
    }

    function childCategories() {
        return $this->belongsToMany('App\Models\Category', 'category_hierarchies', 'parent_category_id', 'child_category_id');
    }

    function parentCategories() {
        return $this->belongsToMany('App\Models\Category', 'category_hierarchies', 'child_category_id', 'parent_category_id');
    }

    function categoryHierarchies() {
        return $this->hasMany('App\Models\CategoryHierarchy');
    }
}
