<?php

namespace app\admin\controller;

use app\admin\model\AboutModel;
use app\admin\model\FooterModel;
use think\Controller;
use think\facade\Session;
use think\Request;

class FooterController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        if(\request()->post()){
            $data=input('post.');
            $result = $this->validate($data,'FooterValidate');
            if(true !== $result){
                Session::flash('error',$result);
                Session::flash('old',$data);
                return redirect('/admin/footer');
            }
            $db=FooterModel::find(1);
            if($db){
                //更新
                $result=$db->updated($data);
                if ($result) {
                    Session::flash('success', '数据更新成功');
                    return redirect('/admin/footer');
                } else {
                    Session::flash('error', '数据更新失败');
                    Session::flash('old', $data);
                    return redirect('/admin/footer');
                }

            }else{
                //添加

                if (count($_FILES) === 1) {
                    $files = current($_FILES);
                    if (!$files['name'] || !$files['type'] || !$files['tmp_name'] || !$files['size']) {
                        Session::flash('error', '请上传微信图层');
                        Session::flash('old', $data);
                        return redirect('/admin/footer');
                    }
                }
                $image_path = uploads('wx_img', 'footer');

                if (!$image_path) {
                    Session::flash('error', '请联系开发人员');
                    Session::flash('old', $data);
                    return redirect('/admin/footer');
                }

                $data['wx_img'] = $image_path;
                $footer = new FooterModel();
                $result = $footer->add($data);
                if ($result) {
                    Session::flash('success', '数据提交成功');
                    return redirect('/admin/footer');
                } else {
                    Session::flash('error', '数据提交失败');
                    Session::flash('old', $data);
                    return redirect('/admin/footer');
                }

            }

        }


        $filed=FooterModel::find(1);
        return view('footer/index',compact('filed'));
    }


    public function upload(){
        return uploads('file','footer');
    }
}
