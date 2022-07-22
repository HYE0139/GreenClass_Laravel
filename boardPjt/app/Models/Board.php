<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    //protected $table = '바꾸고 싶은 테이블명';
    //protected $primarykey = 'i_board'; 바꾸고 싶은 PK

    protected $fillable = ['title', 'ctnt', 'hits']; // 저장?
    protected $auarded = ['created_at']; // 수정을 원하지 않는 컬럼 
}
