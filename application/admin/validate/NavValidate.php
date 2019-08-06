<?php

namespace app\admin\validate;

use think\Validate;

class NavValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
	protected $rule = [
        'title'=>'require|chs|max:4',
        'description'=>'require',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'title.require'=>'导航栏名称不能为空',
        'title.chs'=>'导航栏名称只能是中文',
        'title.max'=>'导航栏名称最大为4个中文字符',
        'description.require'=>'导航栏描述不能为空',
    ];
}
