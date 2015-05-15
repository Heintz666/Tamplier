<div id="accordion">
<h2><a href="#">Первый заголовок</a></h2>
<div>Содержимое первого заголовка</div>
<h2><a href="#">Второй заголовок</a></h2>
<div class="test ui-corner-all">Содержимое второго заголовка</div>
</div>

<span class="ui-icon ui-icon-grip-solid-horizontal"></span>

<h1>Contacts</h1>
<button class="btn btn-info">111</button>
<div class="thumbnail">
     <img src="/img/ima.gif" width="200"> <img src="/img/ima.gif" width="200" class="img-circle">
	  <img src="/img/ima.gif" width="100"> <img src="/img/ima.gif" width="100"> <img src="/img/ima.gif" width="500">
      <h3>Заголовок</h3>
      <small>Было восемь часов утра - время, когда офицеры, чиновники и приезжие обыкновенно после жаркой, душной ночи купались в море и потом шли в павильон пить кофе или чай.</small>
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