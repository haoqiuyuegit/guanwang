<?php

namespace app\admin\validate;

use think\Validate;

class CaseValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'title'=>'require|max:6',
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
        'title.max'=>'案例标题最大长度为6个中文字符',
        'content.require'=>'内容不能为空',
    ];
}
