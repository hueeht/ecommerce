<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'price_sale',
        'description',
        'category_id',
        'trademark_id',
        'memory_id',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function trademark()
    {
        return $this->belongsTo(Trademark::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function memory()
    {
        return $this->belongsTo(Memory::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
