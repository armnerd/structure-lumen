<?php

namespace App\Repositories;

/**
 * 引入对应表模型
 * 仅对应一张表的操作
 * 若需要联表，可以使用模型中定义的hasOne、hasMany
 * 或直接在这里使用join，不做限制
 */
use App\Models\Demo;

class DemoRepository extends BaseRepository
{
    /**
     * 实现基类中方法，将模型实例放入成员中
     * @author fanzhen
     */
    public function model()
    {
        //返回对应表模型
        return demo::class;
    }

    /**
     * 使用Eloquen或DB进行数据操作，轻逻辑或没有
     * @author fanzhen
     */
    public function getAllData()
    {
        return $this->model->where('status', Demo::READ)->get();
    }
}
