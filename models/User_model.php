<?php
require_once '../entity/User.php';

class User_model extends model
{
    public function getRows()
    {
        $sql = "SELECT * FROM user";
        $rows = $this->getAll($sql);
        return $rows;
    }

    public function login($userName = "", $passWord = "")
    {
        $sqlUser = "SELECT * FROM users";
        if ($userName != "" and $passWord != "")
            $sqlUser .= " WHERE Username=$userName and Password=$passWord";
        $row = $this->getRow($sqlUser);
        $userEntity = new User();
        $userEntity->Id = $row['Id'];
        $userEntity->UserName = $row['UserName'];
        $sqlToken = "INSERT INTO Token (UserId,TokenCode,FlagValid,InsertTime,UpdateTime)
                               VALUES($userEntity->Id,'Token',true,Date('c')); ";
        $res = $this->execQuery($sqlToken);
        $userEntity->TokenCode = 'Token';
        return $userEntity;
    }

    public function LogOut($token)
    {
        $sql = "UPDATE users SET FlagValid='False',UpdateTime=Date('c') WHERE TokenCode=$token";
        $res = $this->execQuery($sql);
        return $res;
    }

// $pwd = '1234';
// $options = [
//     'cost' => 11,
//     'salt' => "c1isvFdxMDdmjOlvxpecFw",
// ];
// $pwd_peppered =hash_hmac("MD5",$pwd, $options);
// $pwd_hashed =  password_hash($pwd_peppered, PASSWORD_BCRYPT, $options);
// if (password_verify($pwd_peppered,$pwd_hashed)) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }
}