<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claimlist extends Model
{
    use HasFactory, SoftDeletes;
    public static $statuses = ['รอชำระ','รอส่งซ่อม','ส่งซ่อม','รับคืนงานซ่อม','ปิดงาน'];

    public function warranty(){
        return $this->belongsTo(Warranty::class,'warranty_id','serial_number');
    }
    public function receipt()
    {
        return $this->hasOne(Receipt::class);
    }

}
