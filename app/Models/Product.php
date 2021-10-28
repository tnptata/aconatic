<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public static $product_types = ['Television','Speaker','Portable_air','Camera'];
    public static $product_status = ['Recommend','Normal'];

    public function warranties(){
        return $this->hasMany(Warranty::class);
    }

    public function buylists(){
        return $this->hasMany(Buylist::class);
    }
}
