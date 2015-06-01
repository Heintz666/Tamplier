<?php
class Model_Gallery extends Model
{
	
	public function get_data($par)
	{	
Session::init();		

$arr = array();	
$testdb = new Db;

$dbh = $testdb->DBH;

$start=1;
$limit=4;

try {
$result = $dbh->prepare("SELECT * FROM `gallery` LIMIT :start,:limit ");
$result->bindValue(':limit',$limit, PDO::PARAM_INT);
$result->bindValue(':start',$start, PDO::PARAM_INT);  
$result->execute();

$error_array = $dbh->errorinfo();

while($row = $result->fetch())
{
array_push($arr,$row[fotomini]);

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