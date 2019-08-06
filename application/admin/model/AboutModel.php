<?php

namespace app\admin\model;

use think\Model;

class AboutModel extends Model
{
    protected $table='about';
    public function add($data){

        return $this->allowField(true)->save($data);
    }

    public function updated($data){
        if($data['image']){
            $arr=['title','description','content','image'];
        }else{
            $arr=['title','description','content'];
        }
        return $this->allowField($arr)->save($data);
    }
}
