<?php

namespace app\admin\controller;

use app\admin\model\AdminModel;
use think\Controller;
use think\facade\Session;

class LoginController extends Controller
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
            if (!$data['username'] || !$data['password']) {
                return ['code' => 10002, 'msg' => '请输入用户名或密码'];
            };
            $db_res = db('admin')->where('username', $data['username'])->where('password', md5($data['password']))->find();
            if (!$db_res) {
                return ['code' => 10002, 'msg' => '用户名或者密码不正确'];
            }
            Session::set('uid', $db_res['id']);
            Session::set('user', $db_res);
            Session::set('timer', time());
            Session::flash('successed', 1);
            return ['code' => 10001, 'msg' => '登录成功'];


        }
        return view('login/index');
    }

    /**
     * 个人中心
     */
    public function personal()
    {
        if (request()->post()) {
            $data = input('post.');
            $result = $this->validate($data, 'PeopleValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/personal');
            }
            $img = db('admin')->where('id', session('uid'))->value('image');
            if (!$img) {
                if (count($_FILES) === 1) {
                    $files = current($_FILES);
                    if (!$files['name'] || !$files['type'] || !$files['tmp_name'] || !$files['size']) {
                        Session::flash('error', '请上传封面图');
                        Session::flash('old', $data);
                        return redirect('/admin/personal');
                    }
                }
                $image_path = uploads('image', 'people');
                if (!$image_path) {
                    Session::flash('error', '请联系开发人员');
                    Session::flash('old', $data);
                    return redirect('/admin/personal');
                }
                $data['image'] = $image_path;
            }
            $people = AdminModel::find(\session('uid'));
            $result = $people->updated($data);
            if ($result) {
                Session::flash('success', '个人信息更新成功');
                Session::set('user', AdminModel::find(session('uid')));
                return redirect('/admin/personal');
            } else {
                Session::flash('error', '个人信息提交失败');
                Session::flash('old', $data);
                return redirect('/admin/personal');
            }
        }

        $filed = db('admin')->find(\session('uid'));
        return view('people/index', compact('filed'));
    }

    /**
     * 编辑密码
     */
    public function edit_pwd()
    {


        if (request()->post()) {
            $data = input('post.');
            $result = $this->validate($data, 'PwdValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                return redirect('/admin/edit_pwd');
            }

            $password = db('admin')->where('id', session('uid'))->value('password');
            if ($password !== md5($data['old_password'])) {
                Session::flash('error', '原始密码不正确');
                return redirect('/admin/edit_pwd');
            }
            if($data['password']!==$data['new_password']){
                Session::flash('error', '两次新密码输入不一致');
                return redirect('/admin/edit_pwd');
            }
           $res=db('admin')->where('id',session('uid'))->update(['password'=>md5($data['password'])]);
            if($res){
                Session::flash('success','密码修改成功，下次记得新密码登录哟！！！');
                return redirect('/admin/edit_pwd');
            }else{
                Session::flash('error','网络错误，请稍后重试');
                return redirect('/admin/edit_pwd');
            }

        }

        return view('people/pwd');


    }

    public function people_upload()
    {
        return uploads('file', 'people');
    }

    /**退出登录
     * @return \think\response\Redirect
     */

    public function logout()
    {
        \session(null);
        return redirect('/admin/login');
    }
}
