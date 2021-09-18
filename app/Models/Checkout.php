<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone', 'user_id', 'email', 'location', 'description', 'status', 'payment_name', 'payment_number', 'payment_secret'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function book(){
        return $this->belongsTo(book::class);
    }
}
