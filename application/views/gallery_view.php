<h1>��������</h1>

<p>
��� ����� ���������� ������������
</p>

<div class="row">

<?php
foreach($data[0] as $row){
echo "
<div class=\"col-md-4\">
<a href=\"#\" class=\"thumbnail\"><img src=".$row." width=\"280\" /></a>
</div>";
}

?>

</div>