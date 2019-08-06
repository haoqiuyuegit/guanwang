<?php

namespace app\admin\model;

use think\Model;

class AdminModel extends Model
{
    protected $table='admin';
    public function updated($data){
        if($data['image']){
            $arr=['username','name','image','long'];
        }else{
            $arr=['username','name','long'];
        }
        return $this->allowField($arr)->save($data);
    }
}
