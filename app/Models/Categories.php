<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'photo',
        'is_parent',
        'parent_id',
        'status'
    ];

    public function parent_category()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'parent_id');
    }

    public function child_category()
    {
        return $this->hasMany('App\Models\Categories', 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id');
    }

    public function sub_products()
    {
        return $this->hasMany('App\Models\Product', 'child_category_id', 'id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
}
