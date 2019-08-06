<?php

namespace app\admin\validate;

use think\Validate;

class PwdValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'old_password'=>'require',
        'new_password'=>'require|min:8|alphaDash',
        'password'=>'require',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'old_password.require'=>'原始密码不能为空',
        'new_password.require'=>'新密码不能为空',
        'new_password.alphaDash'=>'新密码格式为字母+数字',
        'new_password.max'=>'新密码长度不得少于8位',
        'password.require'=>'确认密码不能为空',
    ];
}
