<?php

namespace app\admin\model;

use think\Model;

class NiceDetailModel extends Model
{
    protected $table='nice_detail';
    public function add($data){
        return $this->allowField(true)->save($data);
    }
    public function updated($data){
        $arr=$data['image']?['title','description','image']:['title','description'];
        return $this->allowField($arr)->save($data);
    }
}
