<?php

class Db 
{
var $DBH;



var $host = "localhost";
var $db_name = "todo";
var $user = "root";
var $pass = "";


function __construct($host = "localhost",$db_name = "tamplater",$user = "root",$pass= "")
{
    $this -> DBH = new PDO("mysql:host=$host;dbname=$db_name",$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES cp1251"));
}




}



	

