<?php

namespace app\admin\controller;

use app\admin\model\NewsModel;
use think\Controller;
use think\facade\Session;
use think\Request;

class NewsController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = db('news')->order('id', 'desc')->select();
        $cid = input('param.id');
        $nav = db('nav')->where('id', $cid)->value('title');
        return view('news/index', compact('data', 'nav', 'cid'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {


        $id = input('param.id');
        $nav = db('nav')->where('id', $id)->value('title');
        return view('news/add', compact('id', 'nav'));
    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = input('post.');
        $result = $this->validate($data, 'NewsValidate');
        if (true !== $result) {
            Session::flash('error', $result);
            Session::flash('old', $data);
            return redirect('/admin/news/' . $data['cid'] . '/create');
        }
        if (count($_FILES) === 1) {
            $files = current($_FILES);
            if (!$files['name'] || !$files['type'] || !$files['tmp_name'] || !$files['size']) {
                Session::flash('error', '请上传新闻封面图');
                Session::flash('old', $data);
                return redirect('/admin/news/' . $data['cid'] . '/create');
            }
        }
        $image_path = uploads('image', 'news');
        if (!$image_path) {
            Session::flash('error', '请联系开发人员');
            Session::flash('old', $data);
            return redirect('/admin/news/' . $data['cid'] . '/create');
        }
        $data['image'] = $image_path;
        $data['create_time'] = date('Y-m-d', time());
        $news = new NewsModel();
        $result = $news->add($data);
        if ($result) {
            Session::flash('success', '新闻内容创建成功');
            return redirect('/admin/news/' . $data['cid']);
        } else {
            Session::flash('error', '创建失败，请检查网络');
            Session::flash('old', $data);
            return redirect('/admin/news/' . $data['cid'] . '/create');
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
    public function edit()
    {

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
        //
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function del()
    {
        $id = input('post.id');
        $result = db('news')->delete($id);
        if($result){
            return ['code'=>10001,'msg'=>'删除成功'];
        }else{
            return ['code'=>10002,'msg'=>'网络错误，请稍后重试'];
        }
    }

    public function edit_save()
    {

        if (\request()->post()) {
            $data = input('post.');
            $result = $this->validate($data, 'NewsValidate');
            if (true !== $result) {
                Session::flash('error', $result);
                Session::flash('old', $data);
                return redirect('/admin/edit_save/' . $data['cid'] . '/'.$data['id']);
            }
            $news = NewsModel::find($data['id']);
            $result = $news->updated($data);
            if ($result) {
                Session::flash('success', '新闻内容更新成功');
                return redirect('/admin/news/' . $data['cid']);
            } else {
                Session::flash('error', '创建失败，请检查网络');
                Session::flash('old', $data);
                return redirect('/admin/edit_save/' . $data['cid'] . '/'.$data['id']);
            }
        }

        $cid = input('param.cid');//栏目id
        $id = input('param.id');//内容id
        $nav = db('nav')->where('id', $cid)->value('title');
        $filed = NewsModel::find($id);
        return view('news/edit', compact('cid', 'id', 'nav', 'filed'));
    }

    public function upload()
    {


        return uploads('file', 'news');
    }
}
