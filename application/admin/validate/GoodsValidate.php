<?php

namespace app\admin\validate;

use think\Validate;

class GoodsValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'name'=>'require',
        'description'=>'require',
        'Introduction'=>'require',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name.require'=>'产品名称不能为空',
        'description.require'=>'产品描述不能为空',
        'Introduction.require'=>'功能介绍不能为空',
    ];
}
