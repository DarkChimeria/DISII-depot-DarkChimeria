<?php
function executeR($connexion,$sql,$parametre=null){
	if($parametre==null){
		$idRequete = $connexion->query($sql);
	}else{
		$idRequete = $connexion->prepare($sql);
		$idRequete->execute($parametre);
	}
	return $idRequete;
}
?>