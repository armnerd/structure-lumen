<?php
/**
 * code => ['msg' => 提示开发人员的错误(英文),'showMsg' => 提示用户的错误(中文)]
 * 错误码为4到5位数字
 * 1开头表示成功并返回信息
 * 4开头表示错误并返回提示
 * 5开头只有一个5000，表示未知错误
 * 其他号段自定义
 * 路由/error/code为错误码查询路由
*/
return [
    '1000'  => ['msg' => 'success','showMsg' => '成功'],
    '4000'  => ['msg' => 'param loss','showMsg' => '参数缺失'],
    '4001'  => ['msg' => 'unauthorized','showMsg' => '验证失败'],
    '5000'  => ['msg' => 'unknown error','showMsg' => '未知错误'],
];
