<?php

namespace app\admin\validate;

use think\Validate;

class SlideValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'title'=>'require|chsAlpha|max:20',
        'description'=>'require|chsAlpha|max:50'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title.require'=>'轮播图标题名称不能为空',
        'title.chsAlpha'=>'输入的格式只能是汉字|字母',
        'title.max'=>'输入的标题长度最大为20个中文字符',
        'description.require'=>'轮播图描述不能为空',
        'description.chsAlpha'=>'输入的格式只能是汉字|字母',
        'description.max'=>'输入的标题长度最大为20个中文字符',
    ];
}
