<?php
class Model_Blog extends Model
{
	
	public function get_data($par)
	{	
Session::init();		

$db = new Db;//new base obj
$dbh = $db->DBH;

$arr = array();

$limit = 3;
$start = 1;	
$name = "название";
$idn ="%$name%";
//LIMIT :start,:limit $res->bindParam(':start',$start);$res->bindParam(':limit',$limit);
try {
$res = $dbh->prepare("SELECT * FROM `users` LIMIT :start,:limit");
$res->bindValue(':start', $start, PDO::PARAM_INT);
$res->bindValue(':limit', $limit, PDO::PARAM_INT);
$res->setFetchMode(PDO::FETCH_ASSOC);
$res->execute();

while($row = $res->fetch())
{
echo $row[id];
$post = array($row[id],$row[login]);
print_r($row);
array_push($arr,$post);

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