<?php

namespace app\admin\model;

use think\Model;

class NiceModel extends Model
{
    protected $table='nice';
    public function add($data){
        return $this->allowField(true)->save($data);
    }
    public function updated($data){
        return $this->allowField(true)->save($data);
    }
}
