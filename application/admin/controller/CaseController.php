<?php

namespace app\admin\controller;

use app\admin\model\CaseModel;
use app\admin\model\NavModel;
use think\Controller;
use think\facade\Session;

class CaseController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

        $cid = input('param.id');
        $nav = db('nav')->where('id', $cid)->value('title');
        $data = db('case')->order('id', 'desc')->select();
        return view('case/index', compact('nav', 'cid', 'data'));
    }

    public function create()
    {
        if (\request()->post()) {
            $data = input('post.');
            $result = $this->validate($data, 'CaseValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/case_create/' . $data['cid']);
            }
            if (count($_FILES) === 1) {
                $files = current($_FILES);
                if (!$files['name'] || !$files['type'] || !$files['tmp_name'] || !$files['size']) {
                    Session::flash('error', '请上传案例封面图');
                    Session::flash('old', $data);
                    return redirect('/admin/case_create/' . $data['cid']);
                }
            }
            $image_path = uploads('image', 'case');
            if (!$image_path) {
                Session::flash('error', '请联系开发人员');
                Session::flash('old', $data);
                return redirect('/admin/case_create/' . $data['cid']);
            }
            $data['image'] = $image_path;
            $data['create_time'] = date('Y-m-d H:i:s', time());
            $news = new CaseModel();
            $result = $news->add($data);
            if ($result) {
                Session::flash('success', '案例内容创建成功');
                return redirect('/admin/case/' . $data['cid']);
            } else {
                Session::flash('error', '创建失败，请检查网络');
                Session::flash('old', $data);
                return redirect('/admin/case_create/' . $data['cid']);
            }

        }

        $cid = input('param.id');
        $nav = db('nav')->where('id', $cid)->value('title');
        return view('case/add', compact('cid', 'nav'));
    }

    public function edit($cid, $id)
    {

        if (\request()->post()) {
            $data = input('post.');
            $result = $this->validate($data, 'CaseValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/case_create/' . $data['cid']);
            }
            $case = CaseModel::find($data['id']);
            $result = $case->updated($data);
            if ($result) {
                Session::flash('success', '案例内容更新成功');
                return redirect('/admin/case/' . $data['cid']);
            } else {
                Session::flash('error', '创建失败，请检查网络');
                Session::flash('old', $data);
                return redirect('/admin/case_create/' . $data['cid']);
            }
        }

        $filed = CaseModel::find($id);
        $nav = NavModel::where('id', $cid)->value('title');
        return view('case/edit', compact('cid', 'nav', 'id', 'filed'));
    }

    public function upload(){
        return uploads('file','case');
    }

    public function del($cid,$id){
        $result =db('case')->delete($id);
        if ($result) {
           return ['code'=>10001,'msg'=>'删除成功'];
        } else {
            return ['code'=>10002,'msg'=>'网络错误，请稍后重试'];

        }
    }


}
