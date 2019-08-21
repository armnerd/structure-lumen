<?php

namespace App\Models;

//模型类名后不再加model后缀
class Demo extends BaseModel
{
    protected $table = 'demo';//配置表名

    //配置常量，函数调用禁止在参数里直接传1,2等数字
    const READ   = 1;  //已读
    const UNREAD = 2;  //未读
    
    //定义hasOne、hasMany等关联关系，供仓储层查询数据时使用
}
