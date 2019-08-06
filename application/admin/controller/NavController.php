<?php

namespace app\admin\controller;

use app\admin\model\NavModel;
use think\Controller;
use think\facade\Session;
use think\Request;

class NavController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        $data=db('nav')->paginate(10);
        $page=input('param.page')?:1;
        return  view('nav/index',compact('data','page'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {

        return view('nav/add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if(\request()->post()){
            $data=input('post.');
            $result = $this->validate($data,'NavValidate');
            if(true !== $result){
                Session::flash('error',$result);
                Session::flash('old',$data);
                return redirect('/admin/nav/create');
            }
            if (count($_FILES) === 1) {
                $files = current($_FILES);
                if (!$files['name'] || !$files['type'] || !$files['tmp_name'] || !$files['size']) {
                    Session::flash('error', '请上传导航栏封面图');
                    Session::flash('old', $data);
                    return redirect('/admin/nav/create');
                }
            }
            $image_path = uploads('image','nav');
            if (!$image_path) {
                Session::flash('error', '请联系开发人员');
                Session::flash('old', $data);
                return redirect('/admin/nav/create');
            }
            $data['image'] = $image_path;
            $data['create_time'] = date('Y-m-d H:i:s', time());
            $nav = new NavModel();
            $result = $nav->add($data);
            if ($result) {
                Session::flash('success', '导航菜单创建成功');
                return redirect('/admin/nav');
            } else {
                Session::flash('error', '创建失败，请检查网络');
                Session::flash('old', $data);
                return redirect('/admin/nav/create');
            }

        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {

        $filed=NavModel::get($id);
        $page=input('param.page');
        return view('nav/edit',compact('filed','page'));
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $data=input('post.');
        $page=input('post.page');
        $result = $this->validate($data,'NavValidate');
        if(true !== $result){
            Session::flash('error',$result);
            Session::flash('old',$data);
            return redirect('/admin/nav/'.$id."/edit?page=".$page);
        }
        $nav=NavModel::find($id);
        $result=$nav->updated($data);
        if ($result) {
            Session::flash('success', '导航菜单更新成功');
            return redirect('/admin/nav');
        } else {
            Session::flash('error', '更新失败，请检查网络');
            Session::flash('old', $data);
            return redirect('/admin/nav/create');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $result=db('nav')->delete($id);
        if($result){
            return ['code'=>10001,'msg'=>'数据删除成功'];
        }else{
            return ['code'=>10002,'msg'=>'删除失败，请稍后重试'];

        }
    }

    public function upload_img(){
        return uploads('file','nav');
    }
}
