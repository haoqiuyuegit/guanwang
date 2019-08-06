<?php

namespace app\admin\model;

use think\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    public function add($data)
    {
        return $this->allowField(true)->save($data);
    }

    public function updated($data)
    {

        $arr =  $data['image']?true:['title', 'author', 'description', 'content'];
        return $this->allowField($arr)->save($data);

    }
}
