<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded;
    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }

    public function attributeValue(){
        return $this->hasMany(AttributeValue::class);
    }

    public function productvariant(){
        return $this->hasMany(ProductVariant::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
