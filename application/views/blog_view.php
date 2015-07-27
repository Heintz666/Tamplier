<h1>Blog</h1>
<span class="glyphicon glyphicon-search"></span>
<?php
foreach ($data[0] as $row){
?>
<div class="post">
<?php
echo $row[id]."<br />";
echo "<a href=/post/index/$row[id]>$row[title]</a><br />";
echo $row[text]."<br />";
echo $row[login]."<br />";
echo $row[avatar]."<br />";
echo "<div class=\"thumbnail\" >";
foreach ($row[postfoto] as $foto){
echo $foto[fotomini];
}
?>
</div>

<hr />
<?php
}
?>


