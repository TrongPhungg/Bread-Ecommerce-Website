<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    protected $table = 'khachhang';
    protected $primaryKey = 'IDKhachhang';
    public $incrementing = false;
    protected $keyType = 'string';
}
