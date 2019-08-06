<?php

namespace app\admin\validate;

use think\Validate;

class AboutValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'title'=>'require',
        'description'=>'require',
        'content'=>'require',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title.require'=>'标题不能为空',
        'description.require'=>'描述不能为空',
        'content.require'=>'内容不能为空',
    ];
}
