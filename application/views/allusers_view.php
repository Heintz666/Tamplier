<h1>Blog</h1>
<span class="glyphicon glyphicon-search"></span>
<?php
echo "blog <br>";

print_r($data[0]);
foreach ($data[0] as $row){

echo $row[0]."<br />";
echo $row[1]."<br />";
echo "<hr />";

}
?>


