<?php

namespace app\admin\controller;

use app\admin\model\CaseModel;
use app\admin\model\GoodsModel;
use think\Controller;
use think\facade\Session;
use think\Request;

class GoodsController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($cid)
    {


        $data=db('goods')->order('id','desc')->select();
        $nav=db('nav')->where('id',$cid)->value('title');
        return view('goods/index',compact('cid','data','nav'));
    }

    public function create($cid){

        if(\request()->post()){
            $data = input('post.');
            $result = $this->validate($data, 'GoodsValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/goods_create/'.$data['cid']);
            }
            if (count($_FILES) === 1) {
                $files = current($_FILES);
                if (!$files['name'] || !$files['type'] || !$files['tmp_name'] || !$files['size']) {
                    Session::flash('error', '请上传案例封面图');
                    Session::flash('old', $data);
                    return redirect('/admin/goods_create/'.$data['cid']);
                }
            }
            $image_path = uploads('image', 'goods');
            if (!$image_path) {
                Session::flash('error', '请联系开发人员');
                Session::flash('old', $data);
                return redirect('/admin/case_create/' . $data['cid']);
            }
            $data['image'] = $image_path;
            $data['create_time'] = date('Y-m-d H:i:s', time());
            $goods = new GoodsModel();
            $result = $goods->add($data);
            if ($result) {
                Session::flash('success', '产品内容创建成功');
                return redirect('/admin/goods/' . $data['cid']);
            } else {
                Session::flash('error', '创建失败，请检查网络');
                Session::flash('old', $data);
                return redirect('/admin/goods_create/'.$data['cid']);
            }

        }

        $nav=db('nav')->where('id',$cid)->value('title');
        return view('goods/add',compact('nav','cid'));
    }

    public function edit($cid,$id){

        if(\request()->post()){
            $data=input('post.');
            $result = $this->validate($data, 'GoodsValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/goods_edit/'.$data['cid']);
            }
            $goods=GoodsModel::find($id);
            $result= $goods->updated($data);
            if ($result) {
                Session::flash('success', '产品内容更新成功');
                return redirect('/admin/goods/' . $data['cid']);
            } else {
                Session::flash('error', '创建失败，请检查网络');
                Session::flash('old', $data);
                return redirect('/admin/goods_edit/'.$data['cid']);
            }

        }

        $filed=GoodsModel::find($id);
        $nav=db('nav')->where('id',$cid)->value('title');
        return view('goods/edit',compact('nav','cid','filed'));
    }

    public function upload(){

        return uploads('file','goods');
    }

    public function del($cid,$id){
        $result=db('goods')->delete($id);
        if ($result) {
            return ['code'=>10001,'msg'=>'数据删除成功'];
        } else {
            return ['code'=>10002,'msg'=>'删除失败，请检查网络'];
        }

    }




}
