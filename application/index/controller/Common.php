<?php
namespace app\index\controller;

use think\App;
use think\Controller;
use think\facade\View;


class Common extends Controller
{
    /**前端主页
     * @return \think\response\View
     */
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $navs=db('nav')->order('id','src')->limit(6)->select();
        $foot=db('footer')->field(['footer_one','footer_two'])->find(1);

        View::share(compact('navs','foot'));
    }


}
