<?php
namespace App\Helpers;

trait ApiResponse
{
    /**
     * 成功返回
     * @author fanzhen
     */
    public function success($data = [], $code = 1000)
    {
        list($msg, $showMsg) = $this->codeCheck($code);
        $this->response($code, $msg, $showMsg, $data);
    }

    /**
     * 失败返回
     * @author fanzhen
     */
    public function failed($code = 4000)
    {
        list($msg, $showMsg) = $this->codeCheck($code);
        $this->response($code, $msg, $showMsg);
    }

    /**
     * 抛出异常
     * @author fanzhen
     */
    public function exception($code = 4000)
    {
        list($msg, $showMsg) = $this->codeCheck($code);
        throw new \Exception($msg);
    }

    /**
     * code检查
     * @author fanzhen
     */
    private function codeCheck($code)
    {
        $codeSet = config('error');
        if (!isset($codeSet[$code])) {
            $result = [
                'message' => 'unknown error',
                'code' => 5000,
                'seq'  => config('sequence'),
            ];
            header('Content-type: application/json');
            echo json_encode($result);
            die;
        }
        return [$codeSet[$code]['msg'], $codeSet[$code]['showMsg']];
    }

    /**
     * 统一响应
     * @author fanzhen
     */
    private function response($code, $msg, $showMsg, $data = [])
    {
        $result = [
            'message' => $msg,
            'showMsg' => $showMsg,
            'code' => $code,
            'seq'  => config('sequence'),
        ];
        if (!empty($data)) {
            $result['data'] = $data;
        }
        header('Content-type: application/json');
        echo json_encode($result);
        die;
    }
}
