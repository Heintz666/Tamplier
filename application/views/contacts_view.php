<div id="accordion">
<h2><a href="#">������ ���������</a></h2>
<div>���������� ������� ���������</div>
<h2><a href="#">������ ���������</a></h2>
<div class="test ui-corner-all">���������� ������� ���������</div>
</div>

<span class="ui-icon ui-icon-grip-solid-horizontal"></span>

<h1>Contacts</h1>
<button class="btn btn-info">111</button>
<div class="thumbnail">
     <img src="/img/ima.gif" width="200"> <img src="/img/ima.gif" width="200" class="img-circle">
	  <img src="/img/ima.gif" width="100"> <img src="/img/ima.gif" width="100"> <img src="/img/ima.gif" width="500">
      <h3>���������</h3>
      <small>���� ������ ����� ���� - �����, ����� �������, ��������� � �������� ����������� ����� ������, ������ ���� �������� � ���� � ����� ��� � �������� ���� ���� ��� ���.</small>
    </div>
	<div class="">
	 <i class="icon-search"></i> 111111111
	</div>
	<div class="alert alert-info">
	
  ...
</div>
<hr>
<input type="text" class="datepicker9" />
<hr>
<?php
echo "contacts";


foreach ($data[0] as $row){
print_r($row);
echo "<img src=".$row[1]." class=\"img-circle\">";
}
?>

<script>
$(document).ready(function() {



$(".test").click(function(){
$(this).html("Jopa");
      $(".test").hide("explode",1000);
   });
   
$(".datepicker9").datepicker({showAnim:'slide',showButtonPanel:true}); 

   

});


</script>