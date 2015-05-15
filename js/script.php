<?php 
print<<<HTML
<script>
$(document).ready(function(){

$("#login").click(function(){
var open = $("#login").hasClass("opened");

if(open == false){
$("#loginin").css("display","block");
$("#login").addClass("opened");
}else{
$("#loginin").css("display","none");
$("#login").removeClass("opened");
}
});

$(".fotomini").click(function(){
$(".fotomini").css("border","1px solid red");
});

});
</script>

HTML;

?>