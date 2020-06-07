<?php

$serverName="localhost";
$userName="root";
$password="";
$dbName="ONLINE_RECIPE";

try{
	
$dbConn =new PDO("mysql:host=$serverName;dbname=$dbName",$userName,$password);


$dbConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//print "connection is successfull";
}catch(PDOException $e)
{
	print $e->getMessage();
}

?>