<?php

namespace app\admin\controller;

use app\admin\model\SlideModel;
use think\Controller;
use think\facade\Session;
use think\Request;

class SlideController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        $data = db('slide')->order('id', 'desc')->paginate(5);
        $page=input('param.page')?:1;
        return view('slide/index', compact('data','page'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('slide/add');
    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        if (\request()->post()) {
            $data = input('post.');
            $data = config_trim($data);
            $result = $this->validate($data, 'SlideValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/slide/create');
            }

            if (count($_FILES) === 1) {
                $files = current($_FILES);
                if (!$files['name'] || !$files['type'] || !$files['tmp_name'] || !$files['size']) {
                    Session::flash('error', '请上传轮播图');
                    Session::flash('old', $data);
                    return redirect('/admin/slide/create');
                }
            }

            $image_path = uploads('image');
            if (!$image_path) {
                Session::flash('error', '请联系开发人员');
                Session::flash('old', $data);
                return redirect('/admin/slide/create');
            }
            $data['image'] = $image_path;
            $data['create_time'] = date('Y-m-d H:i:s', time());
            $slide = new SlideModel();
            $result = $slide->add($data);

            if ($result) {
                Session::flash('success', '轮播图创建成功');
                return redirect('/admin/slide');
            } else {
                Session::flash('error', '创建失败，请检查网络');
                Session::flash('old', $data);
                return redirect('/admin/slide/create');
            }


        }
    }

    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $filed = SlideModel::get($id);
        $page=input('param.page');
        return view('slide/edit',compact('filed','page'));
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request
     * @param int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        if(\request()->post()){
            $page=input('post.page');
            $data=input('post.');
            $data = config_trim($data);
            $result = $this->validate($data, 'SlideValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/slide/'.$id.'/edit?page='.$page);
            }
            $slide=SlideModel::find($id);
            $result=$slide->updated($data);
            if($result){
                Session::flash('success', '轮播数据更新成功');
                return redirect('/admin/slide?page='.$page);
            }else{
                Session::flash('error', '更新失败，请稍后重试');
                Session::flash('old', $data);
                return redirect('/admin/slide/'.$id.'/edit?page='.$page);
            }

        }
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {

       $res=db('slide')->delete($id);
       if($res){
           return ['code'=>10001,'msg'=>'删除成功'];
       }else{
           return ['code'=>10002,'msg'=>'删除失败'];
       }
    }

    public function upload_img(){
       return uploads();
    }
}
