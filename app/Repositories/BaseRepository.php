<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

abstract class BaseRepository
{
    protected $model;
    
    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $table = $this->model();
        $this->model = new $table;
    }

    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    abstract public function model();
}
