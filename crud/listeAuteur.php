<?php
require_once 'include/infoConnexion.php';
require_once 'include/connect.php';
require_once 'include/executeRequete.php';
$connexion = connect(SERVER,BASEDEDONNEES,UTILISATEUR,MOTDEPASSE);
?>
<?php include 'include/header.php' ?>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<?php include 'include/menu.php' ?>
			<?php
			if ( isset($_GET['success']) && $_GET['success'] == 1 )
{
     // treat the succes case ex:
     echo $msg = "
    <div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Super !</strong>  L'auteur a bien été modifié
    </div>
    ";
}elseif ( isset($_GET['success']) && $_GET['success'] == 2 ){

echo $msg = "
    <div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Super !</strong>  L'auteur a bien été ajouté
    </div>
    ";

}elseif ( isset($_GET['success']) && $_GET['success'] == 3 ){

echo $msg = "
    <div class='alert alert-warning'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Super !</strong>  L'auteur a bien été supprimé
    </div>
    ";

}
?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>
							Nom
						</th>
						<th>
							Prénom
						</th>
						<th>
							Actions
						</th>
					</tr>
				</thead>
				<tbody>
				<?php

$sql = "SELECT * FROM auteur";
$idRequete = executeR($connexion,$sql);
while($row=$idRequete->fetch(PDO::FETCH_ASSOC)){
	echo '<tr><td>' . $row['nom'] . '</td><td>' . $row['prenom'] . '</td><td><form method="get"><a href="details.php?id=' . $row['id_auteur'] . '"><i class="fa fa-folder text-infos"></i></a> <a href="update.php?id=' . $row['id_auteur'] . '"><i class="fa  fa-edit text-success"></i></a> <a href="delete.php?id=' . $row['id_auteur'] . '"><i class="fa  fa-close text-danger"></i></a></form></td></tr>';
}

?>
				</tbody>
			</table>
			
			<br>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>