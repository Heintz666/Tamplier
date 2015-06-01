<?php
class Model_Login extends Model
{
    public function get_data()
    {	

if (isset($_POST['login']))
 {
 $login = $_POST['login']; 

 if ($login == '') { unset($login);} 
 } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password']))
	{ 
	$password=$_POST['password']; 

	if ($password =='') 
	{ 
	unset($password);} 
	}
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {


			$error = "¬ы ввели не всю информацию, вернитесь назад и заполните все пол€!";
			exit($error);
  
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);
//удал€ем лишние пробелы
    $login = trim($login);
    $password = trim($password);
 


$password    = md5($password);//шифруем пароль
$password    = strrev($password);// дл€ надежности добавим реверс
$password    = $password."b3p6f";

//вытаскиваем все данные из базы данных
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
 $error = "Ќеправильный логин или пароль"; 
 echo $error;
 Session::destroy();

  }
  
 } 
  
  
 }

catch(PDOException $e) {  
    echo $e->getMessage();  
} 
  
///////////// 

//вытаскиваем все данные из базы данных

					  
	}
        
    }

