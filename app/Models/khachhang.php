<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Khachhang extends Model
{
    protected $table = 'khachhang';
    protected $primaryKey = 'IDKhachhang';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(user::class, 'IDKhachhang', 'IDKhachhang'); // 'id' là khóa chính của bảng Khachhang
    }
}
