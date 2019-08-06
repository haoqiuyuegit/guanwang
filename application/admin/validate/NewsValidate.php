<?php

namespace app\admin\validate;

use think\Validate;

class NewsValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
	protected $rule = [
        'title'=>'require|max:25',
        'author'=>'require',
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
        'title.require'=>'新闻标题不能为空',
        'title.max'=>'文章标题最大长度为25个中文字符',
        'author.require'=>'请输入新闻作者',
        'description.require'=>'新闻描述不能为空',
        'content.require'=>'新闻内容不能为空',
    ];
}
