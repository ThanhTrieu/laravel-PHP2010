<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // khai bao model nay su dung cho bang nao
    protected $table = 'categories';

    // khai bao khoa chinh
    protected $primaryKey = 'id';

}
