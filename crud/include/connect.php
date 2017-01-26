<?php
function connect($server,$bdd,$user,$psw){
try{
$connexion = new PDO('mysql:host='. $server . ';dbname=' . $bdd,$user,$psw,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
return $connexion;
} catch (PDOException $e) {
	echo 'Connexion échouée : ' . $e->getMessage();
}
}
?>