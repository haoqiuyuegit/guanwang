<?php

namespace app\admin\controller;

use app\admin\model\AboutModel;
use think\Controller;
use think\facade\Session;

class AboutController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($id)
    {

        if (\request()->post()) {
            $data = input('post.');
            $db_model = AboutModel::find(1);
            $result = $this->validate($data, 'AboutValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/about/' . $data['id']);
            }
            if (!$db_model) {
                if (count($_FILES) === 1) {
                    $files = current($_FILES);
                    if (!$files['name'] || !$files['type'] || !$files['tmp_name'] || !$files['size']) {
                        Session::flash('error', '请上传封面图');
                        Session::flash('old', $data);
                        return redirect('/admin/about/' . $data['id']);
                    }
                }
                $image_path = uploads('image', 'about');
                if (!$image_path) {
                    Session::flash('error', '请联系开发人员');
                    Session::flash('old', $data);
                    return redirect('/admin/about/' . $data['id']);
                }
                $data['image'] = $image_path;
                $about = new AboutModel();
                $result = $about->add($data);
                if ($result) {
                    Session::flash('success', '数据提交成功');
                    return redirect('/admin/about/' . $data['id']);
                } else {
                    Session::flash('error', '数据提交失败');
                    Session::flash('old', $data);
                    return redirect('/admin/about/' . $data['id']);
                }
            }else{
                //执行编辑
                $result=$db_model->updated($data);
                if ($result) {

                    Session::flash('success', '数据更新成功');
                    return redirect('/admin/about/' . $data['id']);
                } else {
                    Session::flash('error', '数据更新失败');
                    Session::flash('old', $data);
                    return redirect('/admin/about/' . $data['id']);
                }
            }
        }


        $nav = db('nav')->where('id', $id)->value('title');
        $filed = AboutModel::find(1);
        $filed?:[];
        return view('about/index', compact('nav', 'id', 'filed'));
    }

    public function about_upload(){

        return uploads('file','about');
    }


}
