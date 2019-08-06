<?php

namespace app\admin\model;

use think\Model;

class GoodsModel extends Model
{
    protected $table='goods';
    public function add($data){

        return $this->allowField(true)->save($data);
    }

    public function updated($data){
        if($data['image']){
            $arr=['name','description','Introduction','image'];
        }else{
            $arr=['name','Introduction','description'];
        }
        return $this->allowField($arr)->save($data);
    }
}
