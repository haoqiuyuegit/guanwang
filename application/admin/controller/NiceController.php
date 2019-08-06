<?php

namespace app\admin\controller;

use app\admin\model\NiceDetailModel;
use app\admin\model\NiceModel;
use think\Controller;
use think\facade\Session;

class NiceController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        if (\request()->post()) {
            $data = input('post.');
            if (!$data['title']) {
                Session::flash('error', '名称不能为空');
                Session::flash('old', $data);
                return redirect('/admin/nice');
            }
            if (!$data['description']) {
                Session::flash('error', '描述不能为空');
                Session::flash('old', $data);
                return redirect('/admin/nice');
            }
            $db = NiceModel::find(1);
            if ($db) {
                //执行更新
                $result = $db->updated($data);
                if ($result) {
                    Session::flash('success', '更新成功');
                    return redirect('/admin/nice');
                } else {
                    Session::flash('success', '更新失败');
                    Session::flash('old', $data);
                    return redirect('/admin/nice');
                }
            } else {
                //执行添加
                $nice = new NiceModel();
                $result = $nice->add($data);
                if ($result) {
                    Session::flash('success', '添加成功');
                    return redirect('/admin/nice');
                } else {
                    Session::flash('success', '添加失败');
                    Session::flash('old', $data);
                    return redirect('/admin/nice');
                }
            }
        }
        $filed = NiceModel::find(1);
        return view('nice/index', compact('filed'));
    }

    public function nice_detail()
    {


        $data = db('nice_detail')->order('id', 'desc')->select();

        return view('nice/nice_detail', compact('data'));
    }

    public function nice_detail_add()
    {

        if (\request()->post()) {
            $data = input('post.');
            $result = $this->validate($data, 'NiceDetailValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/nice_detail_add');
            }
            if (count($_FILES) === 1) {
                $files = current($_FILES);
                if (!$files['name'] || !$files['type'] || !$files['tmp_name'] || !$files['size']) {
                    Session::flash('error', '请上传封面图');
                    Session::flash('old', $data);
                    return redirect('/admin/about/' . $data['id']);
                }
            }
            $image_path = uploads('image', 'about');
            $data['image'] = $image_path;
            $nice_detail = new NiceDetailModel();
            $result = $nice_detail->add($data);
            if ($result) {
                Session::flash('success', '数据创建成功');
                return redirect('/admin/nice_detail');
            } else {
                Session::flash('success', '数据创建失败');
                Session::flash('old', $data);
                return redirect('/admin/nice_detail_add');
            }
        }

        return view('nice/nice_detail_add');
    }

    public function nice_detail_edit($id)
    {

        if(request()->post()){
            $data=input('post.');
            $result = $this->validate($data, 'NiceDetailValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/nice_detail_edit/'.$data['id']);
            }
            $nice_detail=NiceDetailModel::find($data['id']);
            $result=$nice_detail->updated($data);
            if ($result) {
                Session::flash('success', '数据更新成功');
                return redirect('/admin/nice_detail');
            } else {
                Session::flash('success', '数据更新失败');
                Session::flash('old', $data);
                return redirect('/admin/nice_detail_edit/'.$data['id']);
            }
        }

        $filed = db('nice_detail')->find($id);
        return view('nice/nice_detail_edit', compact('filed'));
    }

    public function nice_detail_del($id){
        $result=db('nice_detail')->delete($id);
        if ($result) {
            return ['code'=>10001,'msg'=>'删除成功'];
        } else {
            return ['code'=>10001,'msg'=>'网络错误，稍后重试'];
        }
    }

    public function upload(){
        return uploads('file','nice_detail');
    }
}
