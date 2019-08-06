<?php

namespace app\index\controller;

use think\Controller;

class Com extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($cid)
    {


        switch (intval($cid)) {
            case 1:
                return redirect('/about/' . $cid);
                break;
            case 2:
                return redirect('/news/' . $cid);
                break;
            case 3:
                return redirect('/cases/'.$cid);
                break;
            case 4:
                return redirect('/goods/'.$cid);
                break;
            case 5:
                return redirect('/recruit/'.$cid);
                break;
            case 6:
                return redirect('/contact/'.$cid);
                break;
            default:
                halt('请求不合法');
                break;
        }


    }

    public function simditor_upload()
    {


        $data = [
            'success' => false,
            'msg' => '上传失败!',
            'file_path' => ''
        ];
        $path = uploads('file', 'simditor');
        if ($path) {
            $data['file_path'] = $path;
            $data['msg'] = "上传成功!";
            $data['success'] = true;
        }
        // 判断是否有上传文件，并赋值给 $file

        return $data;

    }


}


