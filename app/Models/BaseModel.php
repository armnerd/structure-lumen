<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    //数据禁止硬删除，特殊表除外(不要继承此基类)
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
