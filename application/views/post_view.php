
<span class="glyphicon glyphicon-search"></span>
<?php

foreach ($data as $row){
?>
<h1><?php echo $row[title];?></h1>
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
<?php
}
?>
<hr />
<h4>Комментарии:</h4>
<?php
foreach ($data[0][commentrow] as $row2){
?>
<div class="comment">
<div class="commleft">
<div class="commlogin"><?php echo $row2[commauthorid].$row2[commlogin];?></div>
<div class="commavatar"><?php echo $row2[commavatar];?></div>
</div>
<div class="commright">
<div class="commdate"><?php echo $row2[commdate];?><div class="commred"><?php echo $row2[commstatus];?> {X}</div></div>
<div class="commtext"><?php echo $row2[commtext];?></div>
</div>

</div>
<?php
}
?>