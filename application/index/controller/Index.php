<?php

namespace app\index\controller;

class Index extends Common
{
    /**前端主页
     * @return \think\response\View
     */
    public function index()
    {

        $slide = db('slide')->order('id', 'desc')->limit(2)->select();
        $main = db('nav')->find(1);
        $main_data = db('about')->find(1);
        $main2 = db('nav')->find(2);
        $main2_data = db('news')->order('id', 'desc')->limit(3)->select();
        $main3 = db('nav')->find(3);
        $main3_data = db('case')->order('id', 'desc')->limit(8)->select();
        $main4 = db('nav')->find(4);
        $main4_data = db('goods')->order('id', 'desc')->limit(18)->select();
        $footer=db('footer')->field(['name','phone','address','site','wx_img'])->find(1);
        $nice=db('nice')->find(1);
        $nice_detail=db('nice_detail')->order('id','desc')->limit(3)->select();
        return view('', compact('slide', 'nice','nice_detail','main','main_data', 'main2', 'main2_data', 'main3', 'main3_data', 'main4', 'main4_data','footer'));
    }

    public function about($cid)
    {

        $nav = db('nav')->find($cid);
        $about = db('about')->find(1);
        return view('', compact('nav', 'about'));
    }

    public function news($cid)
    {
        $nav = db('nav')->find($cid);
        $news = db('news')->order('id', 'desc')->paginate(5);
        return view('', compact('nav', 'news','cid'));
    }
    public function news_detail($cid, $id)
    {
        $nav = db('nav')->find($cid);
        $detail=db('news')->find($id);
        $pre=db('news')->where('id','<',$detail['id'])->order('id','desc')->value('id');
        $next=db('news')->where('id','>',$detail['id'])->order('id','src')->value('id');
        $first=db('news')->order('id','src')->limit(1)->value('id');
        $last=db('news')->order('id','desc')->limit(1)->value('id');
        return view('', compact('nav','detail','pre','next','cid','first','last'));
    }

    public function cases($cid)
    {
        $nav = db('nav')->find($cid);
        $case = db('case')->order('id', 'desc')->paginate(8);
        return view('', compact('nav', 'case', 'cid'));
    }

    public function case_detail($cid, $id)
    {
        $nav = db('nav')->find($cid);
        $detail=db('case')->find($id);
        $pre=db('case')->where('id','<',$detail['id'])->order('id','desc')->value('id');
        $next=db('case')->where('id','>',$detail['id'])->order('id','src')->value('id');
        $first=db('case')->order('id','src')->limit(1)->value('id');
        $last=db('case')->order('id','desc')->limit(1)->value('id');
        return view('', compact('nav','detail','pre','next','cid','first','last'));
    }

    public function goods($cid){

        $nav = db('nav')->find($cid);
        $goods=db('goods')->order('id','desc')->select();
        return view('', compact('nav','goods'));

    }

    public function recruit($cid){
        $nav = db('nav')->find($cid);
        $recruit=db('recruit')->order('id','desc')->select();
        return view('', compact('nav','recruit'));
    }

    public function contact($cid){
        $nav = db('nav')->find($cid);
        $contact=db('contact')->find(1);
        return view('',compact('nav','contact'));
    }

    public function clicks($id){
      $res=db('news')->where('id',$id)->setInc('click');
      if($res){
          return ['code'=>1];
      }else{
          return ['code'=>0];
      }
    }

}
