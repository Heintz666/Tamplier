<?php
class Userinfo
{

var $id;
var $login;
var $password;
var $avatar;
var $email;

function Setuser($user) {
$result3= mysql_query("SELECT * FROM users WHERE id = '$user'");
$myrow3    = mysql_fetch_assoc($result3);

if(isset($myrow3['id']) AND $myrow3['id']==$user){
$this->id = $user;
$this->login = $login;
$this->password = $password;
$this->avatar = $avatar;
$this->email = $email;
}
}


function Getuser() {
echo $this->id;
echo $this->login;
echo $this->password;
echo $this->avatar;
echo $this->email;
}

}

?>