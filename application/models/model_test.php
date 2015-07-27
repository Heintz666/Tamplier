<?php
class Model_Test extends Model
{
	
	public function get_data($par)
	{	
Session::init();		

if(isset($par) AND $par!=""){
$page = $par;
}else{ 
$page=1;
}

$db = new Db;//new base obj
$dbh = $db->DBH;

$arr = array();

$limit = 3;
$start = $page-1;	

try {					
$res = $dbh->prepare("SELECT * FROM `posts` LEFT JOIN `users` ON posts.userid = users.id ORDER BY posts.id DESC LIMIT :start,:limit");// данные о постах
$res->bindValue(':start', $start, PDO::PARAM_INT);
$res->bindValue(':limit', $limit, PDO::PARAM_INT);
$res->setFetchMode(PDO::FETCH_ASSOC);
$res->execute();

while($row = $res->fetch())
{

$post = array(
			"id"=>$row[id],
			"title"=>$row[title],
			"text"=>$row[text],
			"login"=>$row[login],
			"avatar"=>"<img src=".$row[avatar]." width='100'/>",
			"postfoto"=>$postfoto,
			);
			
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
		$pagenum,
		);
	}
	
}	