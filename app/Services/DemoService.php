<?php

namespace App\Services;

use Log;
//引用需要的表仓储类，进行数据查询
use App\Repositories\DemoRepository;

class DemoService extends BaseService
{
    protected $demo;

    public function __construct()
    {
        //将表仓储类注入到成员中
        $this->demo = self::model(DemoRepository::class);
    }

    /**
     * service demo
     * @author fanzhen
     */
    public function demo()
    {
        //这里是可复用的逻辑代码块，本层不要出现直接数据操作，若需要调用对应仓储层方法，如下
        $data = $this->demo->getAllData();
        return $data;
    }
}
