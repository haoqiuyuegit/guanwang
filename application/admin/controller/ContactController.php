<?php

namespace app\admin\controller;

use app\admin\model\ContactModel;
use app\admin\validate\PwdValidate;
use think\Controller;
use think\facade\Session;
use think\Request;

class ContactController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($cid)
    {

        if(\request()->post()){
            $data=input('post.');
            if(!$data['title']){
                Session::flash('error','联系我们--主题不能为空');
                return redirect('/admin/contact/'.$cid);
            }
            if(!$data['content']){
                Session::flash('error','联系我们--内容不能为空');
                return redirect('/admin/contact/'.$cid);
            }
            $contact=ContactModel::find(1);
            if($contact){
                //执行更新
                $result=$contact->where('id',1)->update($data);
                if($result){
                    Session::flash('success','数据更新成功');
                    return redirect('/admin/contact/'.$cid);
                }else{
                    Session::flash('error','网络错误，请稍后重试');
                    return redirect('/admin/contact/'.$cid);
                }
            }else{
                //执行添加
                $contact=new ContactModel();
                $result=$contact->add($data);
                if($result){
                    Session::flash('success','数据创建成功');
                    return redirect('/admin/contact/'.$cid);
                }else{
                    Session::flash('error','网络错误，请稍后重试');
                    return redirect('/admin/contact/'.$cid);
                }
            }

        }

        $filed=ContactModel::find(1);
        $nav=db('nav')->where('id',$cid)->value('title');
        return view('contact/index',compact('nav','cid','filed'));
    }


}
