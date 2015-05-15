<h1>Галлерея</h1>

<p>
Тут будут фотографии пользователя
</p>
<div class="thumbnail">
<?php

foreach($data[0] as $row){
echo "<img src=".$row.">";
}

?>

</div>