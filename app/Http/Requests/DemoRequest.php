<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;

class DemoRequest extends BaseRequest
{
    /**
     * 参数验证示例
     * @author fanzhen
     */
    public static function demo($request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            self::failed();
        }
    }
}
