<?php

namespace app\admin\model;

use think\Model;

class CaseModel extends Model
{
    protected $table = 'case';

    public function add($data)
    {
        return $this->allowField(true)->save($data);
    }

    public function updated($data)
    {

        $arr =  $data['image']?['title', 'content','create_time','image']:['title', 'create_time', 'content'];
        return $this->allowField($arr)->save($data);

    }
}
