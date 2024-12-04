<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class danhgia extends Model
{
    //
    protected $table= 'danhgia';
    public $timestamps = false;

    protected $primaryKey = 'IDDanhgia';

    protected $fillable = [
        'Trangthaidg'
    ];

    public function khachhang()
    {
        return $this->belongsTo(Khachhang::class, 'IDKhachhang', 'IDKhachhang'); // 'id' là khóa chính của bảng Khachhang
    }
}
