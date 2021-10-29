<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use HasFactory, SoftDeletes;

    public function claimlist()
    {
        return $this->hasOne(ClaimList::class);
    }
}
