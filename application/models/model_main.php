<?php

class Model_Main extends Model
{
  
	public function get_data($par)
	{
	
$arr = array();	
$testdb = new Db;

$dbh = $testdb->DBH;
$subscribe2 = "pavlushka2";
$subscribe = "pavlushka";

$data = array($subscribe2,$subscribe);

try {
foreach ($data as $row){ 
$result = $dbh->prepare("SELECT * FROM `portfolio` WHERE subscribe=:subscribe");
$result->bindParam(':subscribe',$subscribe2);  
$subscribe2 = $row;
$result->execute();

$error_array = $dbh->errorinfo();

while($row = $result->fetch())
{

array_push($arr,$row[idf]);

}

}

}

  
catch(PDOException $e) {  
    echo $e->getMessage();  
}





  
  
  
  
}	
	
	
}
