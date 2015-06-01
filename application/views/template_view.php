<?php 
Session::init();
$id = Session::get('userid');
$login = Session::get('login');
$avatar = Session::get('avatar');
$email = Session::get('email');
$userstatus = Session::get('userstatus');
?>
<!DOCTYPE html>
<html>
 <head>
<title>Blogster</title>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet/less" type="text/css" href="/css/styles.less" />
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/1.7.3/less.min.js"></script>


    <script src="/bootstrap/js/bootstrap.min.js"></script>
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="/bootstrap/js/bootstrap.js"></script>
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	
</head>
<body>

	<div id="grass">
	
<header>
header
</header>
		
<nav>
<a href="/"><div class="menu">Главная</div></a> 
<a href="/about"><div class="menu">О сайте</div></a>
<a href="/blog"><div class="menu">Блог</div></a>
<a href="/gallery"><div class="menu">Галерея</div></a>
<a href="/contacts"><div class="menu">Контакты</div></a>
<div class="menu" id="login">LOGIN</div>

<div id="loginin">
<?php if(isset($id)){?>
<ul>
<li>Вы вошли как <?php echo $login;?></li>
<li>Ваш профиль <a href="/profile/index/<?php echo $id;?> target="_self">
<span class="glyphicon glyphicon-user"></span></li>
<li><a href="/login_out/" class="menu">
<img src="/img/exit.png" height="16"> <span class="glyphicon glyphicon-off"></span> 
Выход</a></li>
<?php
echo $userstatus;
if($userstatus=="admin" || $userstatus=="superadmin" ){
?>
<li><a href="/admin" target="_blank">Админпанель </a>
<span class="glyphicon glyphicon-tower"></span>
</li>
<?php
}
?>
</ul><?php } else {?>


<div class="container">
<form class="form-signin" role="form" action="/login" method="POST">
<div class="form-group">
<h3 class="form-signin-heading">Please sign in</h3>
<input type="text" class="input-block-level" class="form-control" placeholder="Введите логин" name="login">
<input type="password" class="input-block-level" class="form-control" placeholder="Введите пароль" name="password">
<label class="checkbox">
<input type="checkbox" value="remember-me" > Remember me
</label>
<button class="btn btn-large btn-primary" type="submit">Sign in</button>
</div> 
</form>
</div> 
<?php } ?>
</div>

</nav>

<div id="main">	

<?php include 'application/views/'.$content_view; ?>	

</div>
</div>
<div id="clear"></div>	

<footer>
footer	
</footer>




 
<?php
Require_js::script_js();	
?>
 
</div> 




</body>
</html>