<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
Route::group('admin', function () {
    Route::rule('login', 'admin/Login_controller/index');
    Route::rule('home', 'admin/Home_controller/index');
    Route::rule('personal', 'admin/Login_controller/personal');//个人中心
    Route::rule('edit_pwd', 'admin/Login_controller/edit_pwd');//编辑密码
    Route::rule('logout', 'admin/Login_controller/logout');//退出登录
    Route::resource('slide', 'admin/Slide_controller');
    Route::resource('nav', 'admin/Nav_controller');
    Route::post('slide/upload', 'admin/Slide_controller/upload_img');
    Route::post('nav/upload', 'admin/Nav_controller/upload_img');
    Route::get('com/:id','admin/Com_controller/index');
    Route::get('about/:id','admin/About_controller/index');
    Route::post('about','admin/About_controller/index');
    Route::resource('news/:id','admin/News_controller');
    Route::rule('edit_save/:cid/:id','admin/News_controller/edit_save','GET|POST');
    Route::post('news/upload','admin/News_controller/upload');
    Route::post('news/delete','admin/News_controller/del');

    Route::get('case/:id','admin/Case_controller/index');
    Route::rule('case_create/:id','admin/Case_controller/create','GET|POST');
    Route::rule('case_edit/:cid/:id','admin/Case_controller/edit','GET|POST');
    Route::post('case_delete/:cid/:id','admin/Case_controller/del');
    Route::post('case_upload','admin/Case_controller/upload');



    Route::get('goods/:cid','admin/Goods_controller/index');
    Route::rule('goods_create/:cid','admin/Goods_controller/create','GET|POST');
    Route::rule('goods_edit/:cid/:id','admin/Goods_controller/edit','GET|POST');
    Route::post('goods_delete/:cid/:id','admin/Goods_controller/del');
    Route::post('goods_upload','admin/Goods_controller/upload');


    Route::get('recruit/:cid','admin/Recruit_controller/index');
    Route::rule('recruit_create/:cid','admin/Recruit_controller/create','GET|POST');
    Route::rule('recruit_edit/:cid/:id','admin/Recruit_controller/edit','GET|POST');
    Route::post('recruit_delete/:cid/:id','admin/Recruit_controller/del');


    Route::rule('contact/:cid','admin/Contact_controller/index','GET|POST');
    Route::rule('footer','admin/Footer_controller/index','GET|POST');
    Route::post('footer_upload','admin/Footer_controller/upload');

    Route::rule('nice','admin/Nice_controller/index');
    Route::rule('nice_detail','admin/Nice_controller/nice_detail');
    Route::rule('nice_detail_add','admin/Nice_controller/nice_detail_add');
    Route::rule('nice_detail_edit/:id','admin/Nice_controller/nice_detail_edit');
    Route::post('nice_detail_upload','admin/Nice_controller/upload');
    Route::post('nice_detail_del/:id','admin/Nice_controller/nice_detail_del');





});

Route::get('/', 'index/index/index');
Route::get('/com/:cid', 'index/com/index');
Route::get('/about/:cid', 'index/index/about');
Route::get('/news/:cid', 'index/index/news');
Route::get('/news_detail/:cid/:id', 'index/index/news_detail');
Route::get('/cases/:cid', 'index/index/cases');
Route::get('/case_detail/:cid/:id', 'index/index/case_detail');
Route::get('/goods/:cid', 'index/index/goods');
Route::get('/recruit/:cid', 'index/index/recruit');
Route::get('/contact/:cid', 'index/index/contact');
Route::post('/clicks/:id', 'index/index/clicks');



