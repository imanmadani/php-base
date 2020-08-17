<?php
class model 
{ 
    protected $conn;
	public function __construct()
	{
		$this->conn = mysqli_connect(DB_HOST , DB_USER , DB_PASS, DB_NAME,3308);
		mysqli_query( $this->conn,"SET NAMES ".DB_COLL );

	}
	public function execQuery($sql)
	{
		$res = mysqli_query(  $this->conn,$sql);
		return $res;
	}
	public function getAll($sql)
	{
		$res = mysqli_query( $this->conn,$sql);
        $rows=array();
		while ( $row=mysqli_fetch_assoc($res))
		     $rows[]=$row;
		return $rows;
	}

	public function getRow($sql)
	{
		$res = mysqli_query($this->conn,$sql);
		$row=mysqli_fetch_assoc($res);
		return $row;
	}
	// API ....
	public function getUserByToken($token)
	{
		$row=$this->getRow("SELECT * FROM `users` WHERE token='$token'");
		return($row);
	}
}
?>