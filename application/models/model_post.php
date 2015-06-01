<?php
Session::init();
class Model_Post extends Model
{
	
	public function get_data($par)
	{	
	
	 Connect_db::connect();	
	$id = Session::get(userid);
	$resarray=array();//array for post
	$comarray=array();//array for comments
	
	if(isset($par))
	{//if isset post id
	//
	$postid = $par;
	
	$db = new Db;//new base obj
	$dbh = $db->DBH;	

	try {
	$limit = 1;
	$res = $dbh->prepare("SELECT * FROM `posts` WHERE id=:postid LIMIT :limit");// данные о постах
	$res->bindValue(':postid', $postid, PDO::PARAM_INT);
	$res->bindValue(':limit', $limit, PDO::PARAM_INT);
	$res->setFetchMode(PDO::FETCH_ASSOC);
	$res->execute();

	while($row = $res->fetch())
	{
	
	
	
	}//while 
	
	$error_array = $dbh->errorinfo();

	}



	catch(PDOException $e) {  
    echo $e->getMessage();  
	}

	
	}else{
	$error = "“акого поста не существует";
	}
	
	}
}	