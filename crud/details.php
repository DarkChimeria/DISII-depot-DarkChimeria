<?php
require_once 'include/infoConnexion.php';
require_once 'include/connect.php';
require_once 'include/executeRequete.php';
$connexion = connect(SERVER,BASEDEDONNEES,UTILISATEUR,MOTDEPASSE);
$idauteur = $_GET['id'];
$sql = "SELECT * FROM auteur WHERE id_auteur = ?";
$idRequete = executeR($connexion,$sql,array($idauteur));
$row=$idRequete->fetch(PDO::FETCH_ASSOC);
$name = $row['nom'];
$firstname = $row['prenom']; 
$birthday = $row['date_naissance']; 
$id = $row['id_auteur'];
?>
<?php
 if (isset($_POST['uvalider'])){
                	$name = $_POST['aname'];
                    $firstname = $_POST['afirstname']; 
                    $birthday = $_POST['abirth'];
                    $id = $_POST['aid'];
                    $sql = "UPDATE auteur SET nom=?,prenom=?,date_naissance=? WHERE id_auteur=?";
                    $idRequete = executeR($connexion,$sql,array($name,$firstname,$birthday,$id));
                    
                    Header( 'Location: listeAuteur.php?success=1' );
                    
                }

                ?>
           <?php include 'include/header.php' ?>
           <body>

           	<div class="container-fluid">
           		<div class="row">
           			<div class="col-md-12">
           				<?php include 'include/menu.php' ?>
           				<div class="container-fluid">
           					<div class="row">
           						<div class="col-md-6">
           							<!-- FORMULAIRE -->
           							<form role="form" method="post">
           								
           								<div class="form-group">
           									<label for="exampleInputEmail1">
           										Nom
           									</label>
           									<input class="form-control" id="exampleInputEmail1" type="text" name="aname"  value="<?php echo $name ?>" readonly>
           								</div>
           								<div class="form-group">
           									<label for="exampleInputPassword1">
           										Prénom
           									</label>
           									<input class="form-control" id="exampleInputPassword1" type="text" name="afirstname" value="<?php echo $firstname ?>" readonly> 
           								</div>
           								<div class="form-group">
           									<label for="exampleInputPassword1">
           										Année de naissance
           									</label>
           									<input class="form-control" id="exampleInputPassword1" type="text" name="abirth" value="<?php echo $birthday ?>" readonly>
           								</div>
           								<a href="listeAuteur.php" class="btn btn-warning"><i class="fa fa-backward "></i>
           									Retourner à la liste des auteurs
           								</a>
           							</form>
           						</div>
           						<div class="col-md-6">
           							Informations
           						</div>
           					</div>
           				</div>
           				<br>
           			</div>
           		</div>
           	</div>

           	<script src="js/jquery.min.js"></script>
           	<script src="js/bootstrap.min.js"></script>
           	<script src="js/scripts.js"></script>
           </body>
           </html>