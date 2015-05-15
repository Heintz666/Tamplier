<?php
class Model_Gallery extends Model
{
	
	public function get_data($par)
	{	
Session::init();		

$arr = array();	
$testdb = new Db;

$dbh = $testdb->DBH;

$start=10;
$limit=12;


try {
$result = $dbh->prepare("SELECT * FROM `motivator` LIMIT $start,$limit ");
$result->bindParam(':login',$login);  
$result->execute();

$error_array = $dbh->errorinfo();

while($row = $result->fetch())
{
array_push($arr,$row[fotomot]);

}

}

  
catch(PDOException $e) {  
    echo $e->getMessage();  
}
			
		
		
		return array(
		$arr,	
		);
	
	}
	
}	