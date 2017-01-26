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
                    $sql = "DELETE FROM auteur WHERE id_auteur = ?";
                    $idRequete = executeR($connexion,$sql,array($idauteur));
                    Header( 'Location: listeAuteur.php?success=3' );
                }

                ?>
<?php include 'include/header.php' ?>
  <body>

    <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php include 'include/menu.php' ?>
      <?php if(isset($msg)) echo $msg;  ?>
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
<!-- FORMULAIRE -->
      <form role="form" method="post">
          <input class="form-control" id="exampleInputEmail1" type="text" name="aid"  value="<?php echo $id ?>" readonly>
        <div class="form-group">
          <label for="exampleInputEmail1">
            Nom
          </label>
          <input class="form-control" id="exampleInputEmail1" type="text" name="aname"  value="<?php echo $name ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">
            Prénom
          </label>
          <input class="form-control" id="exampleInputPassword1" type="text" name="afirstname" value="<?php echo $firstname ?>"> 
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">
            Année de naissance
          </label>
          <input class="form-control" id="exampleInputPassword1" type="number" name="abirth" value="<?php echo $birthday ?>">
        </div>
        <button type="submit" class="btn btn-danger" name="uvalider">
          Supprimer
        </button>
      </form>
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