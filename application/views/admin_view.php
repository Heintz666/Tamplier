<h1>�����������</h1>

<?php
echo $data[test];
?>

<div class="reqform">
��������� �����
<form action="" method="POST">
<ul class="inpf">
<li><input type="text" name="name" class="inpf field1" value="���� ���"/></li>
<li><input type="text" name="email"  class="inpf field2" value="���� email"/></li>
<li>
<textarea name="text" class="inpf field3">���� ���������</textarea>
</li>
<li><input type="submit" name="ok" id="ok" value="���������" /></li>
</ul>
</div>
</div>

</div>

<script>
$(document).ready(function(){
var fieldval1 =  $(".field1").val();
var fieldval2 =  $(".field2").val();
var fieldval3 =  $(".field3").val();
 
$(".field1").focus(function(){
$(this).val("");
});
$(".field1").blur(function(){
$(this).val(fieldval1);
});

$(".field2").focus(function(){
$(this).val("");
});
$(".field2").blur(function(){
$(this).val(fieldval2);
});

$(".field3").focus(function(){
$(this).val("");
});
$(".field3").blur(function(){
$(this).val(fieldval3);
});
 
 });
</script>
