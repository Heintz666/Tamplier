<h1>�����������</h1>

<p>
�����������������
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