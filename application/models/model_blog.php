<?php
class Model_Blog extends Model
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
$res = $dbh->prepare("SELECT * FROM `posts` LIMIT :start,:limit");// данные о постах
$res->bindValue(':start', $start, PDO::PARAM_INT);
$res->bindValue(':limit', $limit, PDO::PARAM_INT);
$res->setFetchMode(PDO::FETCH_ASSOC);
$res->execute();

while($row = $res->fetch())
{

$postfoto = array();
$postauthor = $row[userid];
$fotos = $row[fotorow];
$fotos = unserialize( $fotos);//превращаем строку в массив ИД фото
$category = 1;// категория для раздела  ->1=blog
foreach($fotos as $fot){

$res3 = $dbh->prepare("SELECT foto,fotomini FROM `gallery` WHERE id=:idf AND category=:category");//вытаскиваем данные о пользователе 
$res3->bindValue(':idf', $fot, PDO::PARAM_INT);
$res3->bindValue(':category', $category, PDO::PARAM_INT);
$res3->setFetchMode(PDO::FETCH_ASSOC);
$res3->execute();//вытаскиваем данные пой ИД фотки

while($row3 = $res3->fetch())
{

$arrfots = array();
$fotomini = "<img src=".$row3[fotomini]." width=\"100\" height=\"100\" class=\"fotomini\"/>";
$foto = "<img src=".$row3[foto]."  />";

$arrfots = array(
			  "foto"=>$foto,
			  "fotomini"=>$fotomini,
				);

array_push($postfoto,$arrfots ); // переделываем в имг и запихиваем в массив

}

}

$res2 = $dbh->prepare("SELECT login,avatar FROM `users` WHERE id=:postauthor");//вытаскиваем данные о пользователе 
$res2->bindValue(':postauthor', $postauthor, PDO::PARAM_STR);
$res2->setFetchMode(PDO::FETCH_ASSOC);
$res2->execute();

while($row2 = $res2->fetch())
{

$avatar = "<img src=".$row2[avatar]." width=\"100\" height=\"100\" />";


}



$post = array(
			"id"=>$row[id],
			"title"=>$row[title],
			"text"=>$row[text],
			"login"=>$row[login],
			"avatar"=>$avatar,
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