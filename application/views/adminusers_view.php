<h1>Админпанель</h1>

<p>
Администрирование
</p>

USERS
<?php
echo $data[test];
?>
<ul>
<?php
print_r ($data[users]);
foreach($data[users] as $user){
echo "<li>".$user[login]."</li>";
}

?>
</ul>