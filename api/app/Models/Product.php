<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Brands;
use Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'photo',
        'condition',
        'price',
        'discount',
        'is_featured',
        'category_id',
        'child_category_id',
        'brand_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id', 'category_id')->where('status', true);
    }

    public function sub_category()
    {
        return $this->belongsTo(Categories::class, 'id', 'child_category_id')->where('status', true);
    }

    public function brands()
    {
        return $this->belongsTo(Brands::class, 'brand_id', 'id')->where('status', true);
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
