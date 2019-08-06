<?php

namespace app\admin\model;

use think\Model;

class ContactModel extends Model
{
    protected $table='contact';
    public function add($data){
        return $this->allowField(true)->save($data);
    }
}
