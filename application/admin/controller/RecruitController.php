<?php

namespace app\admin\controller;

use app\admin\model\RecruitModel;
use think\Controller;
use think\facade\Session;
use think\Request;

class RecruitController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($cid)
    {
        $nav=db('nav')->where('id',$cid)->value('title');
        $data=db('recruit')->order('id','desc')->select();
        return  view('recruit/index',compact('cid','nav','data'));
    }

    public function create($cid){

        if(\request()->post()){
            $data=input('post.');
            $result = $this->validate($data, 'RecruitValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/recruit_create/' . $data['cid'] );
            }
            $data['create_time']=date('Y-m-d H:i:s',time());
            $recruit=new RecruitModel();
            $result=$recruit->add($data);
            if ($result) {
                Session::flash('success', '数据创建成功');
                return redirect('/admin/recruit/' . $data['cid']);
            } else {
                Session::flash('error', '创建失败，请检查网络');
                Session::flash('old', $data);
                return redirect('/admin/recruit_create/' . $data['cid']);
            }

        }
        $nav=db('nav')->where('id',$cid)->value('title');
        return view('recruit/add',compact('cid','nav'));
    }

    public function edit($cid,$id){

        if(\request()->post()){
            $data=input('post.');
            $result = $this->validate($data, 'RecruitValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/recruit_create/' . $data['cid'] );
            }
            $recruit=RecruitModel::find($id);
            $result=$recruit->updated($data);
            if ($result) {
                Session::flash('success', '数据更新成功');
                return redirect('/admin/recruit/' . $data['cid']);
            } else {
                Session::flash('error', '更新失败，请检查网络');
                Session::flash('old', $data);
                return redirect('/admin/recruit_edit/' . $data['cid'].'/'.$data['id']);
            }
        }
        $nav=db('nav')->where('id',$cid)->value('title');
        $filed=RecruitModel::find($id);
        return view('recruit/edit',compact('cid','nav','filed'));
    }

    public function del($cid,$id){
        $result=db('recruit')->delete($id);
        if ($result) {
           return ['code'=>10001,'msg'=>'数据删除成功'];
        } else {
          return ['code'=>10002,'msg'=>'网络错误，请稍后重试'];
        }

    }

}
