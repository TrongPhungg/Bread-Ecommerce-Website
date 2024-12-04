<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    protected $table='donhang';
    protected $primaryKey = 'IDDonhang';
    public $incrementing = true;
    public $timestamps = false;


    protected $fillable = [
        'Ngaylapdh',
        'Trangthaidh',
        'Tongtien',
        'Diachi'
    ];
}
