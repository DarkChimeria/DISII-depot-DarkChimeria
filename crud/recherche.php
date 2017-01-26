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
            <div class="container-fluid">
            <div class="row">
        <div class="col-md-6">
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
                            Année de naissance
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 if (isset($_POST['rvalider'])){
$searchnom = $_POST['search'];
$searchprenom = $_POST['search'];
$searchdate = $_POST['search'];
$pourcentage = "%";
$valeur1 = $pourcentage . $searchnom . $pourcentage;
$valeur2 = $pourcentage . $searchprenom . $pourcentage;
$valeur3 = $pourcentage . $searchdate . $pourcentage;
$sql = "SELECT * FROM auteur WHERE nom LIKE ? OR prenom LIKE ? OR date_naissance LIKE ?";
$idRequete = executeR($connexion,$sql,array($valeur1,$valeur2,$valeur3));
echo "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Super !</strong> Voici le résultat de votre recherche à partir de  :  <strong>" . $valeur1 . "</strong></div>";
while($row=$idRequete->fetch(PDO::FETCH_ASSOC)){
    echo '<tr><td class="warning">' . $row['nom'] . '</td><td class="success">' . $row['prenom'] . '</td><td class="info">' . $row['date_naissance'] . '</td><td><form method="get"><a href="details.php?id=' . $row['id_auteur'] . '"><i class="fa fa-folder text-infos"></i></a> <a href="update.php?id=' . $row['id_auteur'] . '"><i class="fa  fa-edit text-success"></i></a> <a href="delete.php?id=' . $row['id_auteur'] . '"><i class="fa  fa-close text-danger"></i></a></form></td></tr>';
}
}
?>
                </tbody>
            </table>
</div>
<div class="col-md-6">
    <blockquote>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
        </p> <small>Someone famous <cite>Source Title</cite></small>
    </blockquote>
    <blockquote>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
        </p> <small>Someone famous <cite>Source Title</cite></small>
    </blockquote>
    <blockquote>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
        </p> <small>Someone famous <cite>Source Title</cite></small>
    </blockquote>
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