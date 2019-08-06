<?php

namespace app\admin\validate;

use think\Validate;

class RecruitValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'name'=>'require',
        'content'=>'require',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title.require'=>'岗位名称不能为空',
        'content.require'=>'招聘要求不能为空',
    ];
}
