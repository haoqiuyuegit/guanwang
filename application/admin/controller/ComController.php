<?php

namespace app\admin\controller;

use think\Controller;

class ComController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($id)
    {

        switch (intval($id)) {
            case 1:
                return redirect('/admin/about/' . $id);
                break;
            case 2:
                return redirect('/admin/news/' . $id);
                break;
            case 3:
                return redirect('/admin/case/'.$id);
                break;
            case 4:
                return redirect('/admin/goods/'.$id);
                break;
            case 5:
                return redirect('/admin/recruit/'.$id);
                break;
            case 6:
                return redirect('/admin/contact/'.$id);
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


