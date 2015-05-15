<?php
class Model_Contacts extends Model
{
	
	public function get_data($par)
	{	

$db = new Db;

$dbh = $db->DBH;
$tag = 1;
$arr = array();
try {
$res = $dbh->prepare("SELECT * FROM `portfolio` WHERE tag = :tag ");
$res->bindParam(':tag',$tag);
$res->execute();

while($row = $res->fetch())
{

$fotoinfo = array($row[idf],$row[minifoto]);

array_push($arr,$fotoinfo);

}	

$error_array = $dbh->errorinfo();

}



catch(PDOException $e) {  
    echo $e->getMessage();  
}

$dbh = null;	
	
	
	
		return array(
		$arr,	
		);
	
	
	}
	
}	