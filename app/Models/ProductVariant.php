<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }

    
}
