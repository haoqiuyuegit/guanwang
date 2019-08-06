<?php

namespace app\admin\model;

use think\Model;

class RecruitModel extends Model
{
    protected $table='recruit';
    public function add($data){

        return $this->allowField(true)->save($data);
    }

    public function updated($data){
        return $this->allowField(true)->save($data);
    }
}
