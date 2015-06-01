<?php
class Model_About extends Model
{
	
	public function get_data($par)
	{	
Session::init();		
$db = new Db;//new base obj
$dbh = $db->DBH;


if(isset($_POST['tester']) AND $_POST['tester']!='')
{
$tester = $_POST['tester'];
$text = "jopkin text";
echo $tester;
try{
$result2 = $dbh->prepare("INSERT INTO `posts` (title,text) VALUES(:titles,:text)");
$result2->setFetchMode(PDO::FETCH_ASSOC);
$result2->bindValue(":titles",$tester, PDO::PARAM_STR);
$result2->bindValue(":text",$text, PDO::PARAM_STR);

$result2->execute();

$error_array = $dbh->errorinfo();
}

catch (PDOExeption $e){
 echo $e->getMessage();
}

}//if


//update 
if(isset($_POST['tester2']) AND $_POST['tester2']!='')
{

$tester2 = $_POST['tester2'];
$date = "2015-05-27";
$userid=1;
echo $tester2;

try{
$result3 = $dbh->prepare("UPDATE `posts` SET userid = :userid ,date =:date WHERE id=16");
$result3->setFetchMode(PDO::FETCH_ASSOC);
$result3->bindValue(":userid",$userid, PDO::PARAM_INT);
$result3->bindValue(":date",$date, PDO::PARAM_STR);

$result3->execute();

$error_array = $dbh->errorinfo();
}

catch (PDOExeption $e){
 echo $e->getMessage();
}

}
//*update

try{
$test = "Заголовок";
$var = "$test";	
$var2 = 4;
$result = $dbh->prepare("SELECT * FROM `posts` WHERE title LIKE :title");
$result->setFetchMode(PDO::FETCH_ASSOC);
$result->bindValue(":title",$test, PDO::PARAM_STR);

$result->execute();

while($tech = $result->fetch())
{

echo $tech[id];


}

$error_array = $dbh->errorinfo();
}

catch (PDOExeption $e){
 echo $e->getMessage();
}

$dbh = null;

	
		return array(
		$resarray,	
		);
	
	
	}
	
}	