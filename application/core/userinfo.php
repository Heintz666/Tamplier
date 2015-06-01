<?php
class Userinfo
{

var $id;
var $login;
var $password;
var $avatar;
var $email;
var $userstatus;

function Setuser($user) {
$db = new Db;//new base obj
$dbh = $db->DBH;

try{
$result3= $dbh->prepare("SELECT * FROM `users` WHERE id = ':user'");
$result3->setFetchMode(PDO::FETCH_ASSOC);
$result3->bindValue(":user",$user, PDO::PARAM_INT);

$result3->execute();
$error_array = $dbh->errorinfo();
}

catch (PDOExeption $e){
 echo $e->getMessage();
}

while($usinfo = $result3->fetch())//вывод результата
{

if(isset($usinfo[id]) AND $usinfo[id]==$user){
$this->id = $usinfo[id];
$this->login = $usinfo[login];
$this->password = $usinfo[password];
$this->avatar = $usinfo[avatar];
$this->email = $usinfo[email];
$this->userstatus = $usinfo[userstatus];
}

}


}


function Getuser() {
echo $this->id;
echo $this->login;
echo $this->password;
echo $this->avatar;
echo $this->email;
echo $this->userstatus;
}

}

?>