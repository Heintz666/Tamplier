<?php
class Model_Admin extends Model
{
	
	public function get_data($par)
	{	
Session::init();
$userstatus = Session::get('userstatus');
if($userstatus=='superadmin'){
//info 

if(isset($par) AND $par!=""){
$page = $par;
}else{ 
$page=1;
}

$test = "<br /><a href='/admin/index/'>Админпанель</a><br />
<a href='/admin/users/'>Users</a><br />
<a href='/admin/users/'>Users</a><br />";

//
$db = new Db;//new base obj
$dbh = $db->DBH;

$userarr = array();

$limit = 3;
$start = $page-1;	

try {					
$res = $dbh->prepare("SELECT * FROM `users` LIMIT :start,:limit");// данные о постах
$res->bindValue(':start', $start, PDO::PARAM_INT);
$res->bindValue(':limit', $limit, PDO::PARAM_INT);
$res->setFetchMode(PDO::FETCH_ASSOC);
$res->execute();

while($row = $res->fetch())
{

$user = array(
			"id"=>$row[id],
			"email"=>$row[email],
			"login"=>$row[login],
			"avatar"=>"<img src=".$row[avatar]." width='100'/>",
			"date"=>$row[date],
			"status"=>$row[userstatus],
			);
			
array_push($userarr,$user);

}

$error_array = $dbh->errorinfo();

}

catch(PDOException $e) {  
    echo $e->getMessage();  
}



//

}else{
//not admin


}

return array(
			"test"=>$test,
			"users"=>$userarr,
			 );
	
	}
	
}	