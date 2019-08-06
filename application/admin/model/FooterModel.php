<?php

namespace app\admin\model;

use think\Model;

class FooterModel extends Model
{
    protected $table='footer';
    public function add($data){
        return $this->allowField(true)->save($data);
    }
    public function updated($data){

        $arr=$data['wx_img']?true:['name','address','phone','site','footer_one','footer_two'];
        return $this->allowField($arr)->save($data);
    }
}
