<?php

namespace app\admin\model;

use think\Model;

class SlideModel extends Model
{
    protected $table='slide';
    protected $createTime=true;
    public function add($data){
      return  $this->allowField(true)->save($data);
    }

    public function updated($data){

        if($data['image']){
            //编辑有图片上传
            $arr=['title','description','image'];
        }else{
            //编辑无图片上传
            $arr=['title','description'];
        }
        return $this->allowField($arr)->save($data);

    }
}
