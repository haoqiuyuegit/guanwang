<?php

namespace app\admin\validate;

use think\Validate;

class FooterValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'name'=>'require',
        'address'=>'require',
        'phone'=>'require',
        'site'=>'require',
        'footer_one'=>'require',
        'footer_two'=>'require',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.require'=>'公司名称不能为空',
        'address.require'=>'公司地址不能为空',
        'phone.require'=>'联系方式不能为空',
        'site.require'=>'官网地址不能为空',
        'footer_one.require'=>'底部数据1不能为空',
        'footer_two.require'=>'底部数据2不能为空',
    ];
}
