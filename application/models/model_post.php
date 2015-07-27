<?php
class Model_Post extends Model
{
	
	public function get_data($par)
	{	
Session::init();		

if(isset($par) AND $par!=""){
$post = $par;
}else{
$post = 0;//если нет поста ид = 0
}

$db = new Db;//new base obj
$dbh = $db->DBH;

$arr = array();

$limit = 1;	

try {
$res = $dbh->prepare("SELECT * FROM `posts` WHERE id = :post LIMIT :limit");// данные о посте
$res->bindValue(':post', $post, PDO::PARAM_INT);
$res->bindValue(':limit', $limit, PDO::PARAM_INT);
$res->setFetchMode(PDO::FETCH_ASSOC);
$res->execute();

while($row = $res->fetch())
{

$postfoto = array();
$postauthor = $row[userid];
$fotos = $row[fotorow];
$fotos = unserialize( $fotos);//превращаем строку в массив »ƒ фото
$category = 1;// категори€ дл€ раздела  ->1=blog
foreach($fotos as $fot){

$res3 = $dbh->prepare("SELECT foto,fotomini FROM `gallery` WHERE id=:idf AND category=:category");//вытаскиваем данные о пользователе 
$res3->bindValue(':idf', $fot, PDO::PARAM_INT);
$res3->bindValue(':category', $category, PDO::PARAM_INT);
$res3->setFetchMode(PDO::FETCH_ASSOC);
$res3->execute();//вытаскиваем данные пой »ƒ фотки

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

$avatar = "<img src=".$row2[avatar]." alt=".$row2[avatar]." width=\"100\" height=\"100\" />";


}




$comments = array();

$rescomm = $dbh->prepare("SELECT * FROM `comments` LEFT JOIN `users` ON comments.commauthorid = users.id WHERE postid = :postcommid ORDER BY comments.id DESC");//вытаскиваем данные о пользователе 
$rescomm->bindValue(':postcommid', $post, PDO::PARAM_INT);
$rescomm->setFetchMode(PDO::FETCH_ASSOC);
$rescomm->execute();//вытаскиваем данные пой »ƒ фотки

while($rowcomm = $rescomm->fetch())
{
echo $rowomm[avatar];
$arrcomms = array();
$commauthorid = $rowcomm[id];
$commlogin = $rowcomm[login];
$commavatar = "<img src=".$rowcomm[avatar]." alt=".$rowcomm[avatar]." width=\"100\" height=\"100\" />";
$commtext = $rowcomm[text];
$commdate = $rowcomm[date];
$commstatus = $rowcomm[status];


$arrcomms = array(
			  "commauthorid"=>$commauthorid,
			  "commlogin"=>$commlogin,
			  "commavatar"=>$commavatar,
			  "commtext"=>$commtext,
			  "commdate"=>$commdate,
			  "commstatus"=>$commstatus,
				);

array_push($comments,$arrcomms ); // переделываем в имг и запихиваем в массив

}



$post = array(
			"id"=>$row[id],
			"title"=>$row[title],
			"text"=>$row[text],
			"userid"=>$postauthor,
			"login"=>$row[login],
			"avatar"=>$avatar,
			"postfoto"=>$postfoto,
			"commentrow"=>$comments,
			);
			
array_push($arr,$post);

}	

$error_array = $dbh->errorinfo();

}



catch(PDOException $e) {  
    echo $e->getMessage();  
}

$dbh = null;


	
		return 
		$arr	
		;
	
	
	}
	
}	