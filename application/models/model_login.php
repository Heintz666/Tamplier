<?php
class Model_Login extends Model
{
    public function get_data()
    {	

if (isset($_POST['login']))
 {
 $login = $_POST['login']; 

 if ($login == '') { unset($login);} 
 } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
    if (isset($_POST['password']))
	{ 
	$password=$_POST['password']; 

	if ($password =='') 
	{ 
	unset($password);} 
	}
    //������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������
if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
    {


			$error = "�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!";
			exit($error);
  
    }
    //���� ����� � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);
//������� ������ �������
    $login = trim($login);
    $password = trim($password);
 


$password    = md5($password);//������� ������
$password    = strrev($password);// ��� ���������� ������� ������
$password    = $password."b3p6f";

//����������� ��� ������ �� ���� ������
/////////////
	
$testdb2 = new Db;

$dbh2 = $testdb2->DBH;
try {
$result2 = $dbh2->prepare("SELECT * FROM `users` WHERE login=:login AND password=:password");
$result2->bindParam(':login',$login);
$result2->bindParam(':password',$password);   
$result2->execute();

$error_array = $dbh2->errorinfo();

while($row2 = $result2->fetch()){

if (!empty($row2[id]))
            {
			$id = $row2[id];
			$avatar = $row2[avatar]; 
			$email = $row2[email];
			$date = $row2[date];
			$userstatus = $row2[userstatus];
		
   Session::init();
   Session::set('loggedIn', true);
   Session::set('userid', $id);
   Session::set('login', $login);
   Session::set('password', $password);
   Session::set('avatar', $avatar);
   Session::set('email', $email);
   Session::set('date', $date);
   Session::set('userstatus', $userstatus);
				 
print "<script>window.location.href='/'</script>";

  } else {
 $error = "������������ ����� ��� ������"; 
 echo $error;
 Session::destroy();

  }
  
 } 
  
  
 }

catch(PDOException $e) {  
    echo $e->getMessage();  
} 
  
///////////// 

//����������� ��� ������ �� ���� ������

					  
	}
        
    }

