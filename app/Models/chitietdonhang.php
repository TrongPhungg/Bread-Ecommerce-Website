<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    protected $table = 'chitietdonhang';
    public $timestamps = false;
    protected $primaryKey = 'IDDonhang';
    protected $fillable = [
        'IDSanpham',
        'IDDonhang',
        'Soluongsp',
        'Dongia',
    ];
}
