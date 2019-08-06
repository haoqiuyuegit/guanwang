<?php

namespace app\admin\validate;

use think\Validate;

class PeopleValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'username'=>'require|alphaDash',
        'name'=>'require',
        'long'=>'require|max:12',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'username.require'=>'登录账号不能为空',
        'username.alphaDash'=>'登录账号不能为中文或特殊符号',
        'name.require'=>'个性昵称不能为空',
        'long.require'=>'个性箴言不能为空',
        'long.max'=>'个性箴言最多为14个中文字符',
    ];
}
