<?php
require_once 'entity/User.php';

class User_model extends model
{
    public function getRows(){
        $sql ="SELECT * FROM users";
        $rows= $this->getAll($sql);
//        set User Model
        $userEntity=new User();
        return $rows;
    }
}