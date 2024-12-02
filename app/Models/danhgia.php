<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class danhgia extends Model
{
    //
    protected $table= 'danhgia';
    public $timestamps = false;

    public function khachhang()
    {
        return $this->belongsTo(Khachhang::class, 'IDKhachhang', 'IDKhachhang'); // 'id' là khóa chính của bảng Khachhang
    }
}
