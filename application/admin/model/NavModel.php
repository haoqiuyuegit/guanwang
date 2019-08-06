<?php

namespace app\admin\model;

use think\Model;

class NavModel extends Model
{
    protected $table='nav';
    public function add($data){
        return $this->allowField(true)->save($data);
    }
    public function updated($data){
        if($data['image']){
            $arr=['title','description','image'];
        }else{
            $arr=['title','description'];
        }
        return $this->allowField($arr)->save($data);
    }
}
