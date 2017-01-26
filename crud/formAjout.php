<?php
require_once 'include/infoConnexion.php';
require_once 'include/connect.php';
require_once 'include/executeRequete.php';
$connexion = connect(SERVER,BASEDEDONNEES,UTILISATEUR,MOTDEPASSE);
                if (isset($_POST['bvalider'])){
                	if ( !empty($_POST['aname']) && !empty($_POST['afirstname']) && !empty($_POST['abirth']) ){
                	$name = $_POST['aname'];
                    $firstname = $_POST['afirstname']; 
                    $birthday = $_POST['abirth']; 
                    $sql = "INSERT INTO auteur (nom,prenom,date_naissance) VALUES (?,?,?)";
                    $idRequete = executeR($connexion,$sql,array($name,$firstname,$birthday));
                    Header( 'Location: listeAuteur.php?success=2' );
                }else{
                	$msg = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button><strong>Attention !</strong> <strong>Vous n'avez renseigné aucun champs !</strong></div>";
                }
                }
           ?>
         
<?php include 'include/header.php' ?>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<?php include 'include/menu.php' ?>
			<?php if(isset($msg)) echo $msg;  ?>
<!-- FORMULAIRE -->
			<form role="form" method="post" action="formAjout.php">
				<div class="form-group">
					<label for="exampleInputEmail1">
						Nom
					</label>
					<input class="form-control" id="exampleInputEmail1" type="text" name="aname" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">
						Prénom
					</label>
					<input class="form-control" id="exampleInputPassword1" type="text" name="afirstname" required>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">
						Année de naissance
					</label>
					<input class="form-control" id="exampleInputPassword1" type="number" name="abirth" required>
				</div>
				<button type="submit" class="btn btn-primary" name="bvalider">
					Ajouter
				</button>
			</form>
			<br>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>