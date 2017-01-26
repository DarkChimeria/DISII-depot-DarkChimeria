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
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
<?php
if (isset($_POST['rvalider']) && !empty($_POST['search'])){
$searchnom = "%" . $_POST['search'] . "%";
$searchprenom = "%" . $_POST['search'] . "%";
$searchbirthday = "%" . $_POST['search'] . "%";
$valeur2 = $_POST['tri'];

    if($_POST['order'] == 'ASC'){
        $asc = 'ASC';
        $tri = "ORDER BY " . $valeur2 . " " . $asc;
    }elseif ($_POST['order'] == 'DESC'){
        $desc = 'DESC';
        $tri = "ORDER BY " . $valeur2 . " " . $desc;        
    }else{
        $tri ="";
    }

$sql = "SELECT * FROM auteur WHERE nom LIKE ? OR prenom LIKE ? OR date_naissance LIKE ? $tri";
// $sql = "SELECT * FROM auteur WHERE MATCH(nom,prenom) AGAINST(?) $tri";
$idRequete = executeR($connexion,$sql,array($searchnom,$searchprenom,$searchbirthday));

if (!$idRequete->rowCount() == 0){
echo "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button><strong>Super !</strong> Voici le résultat de votre recherche à partir de  :  <strong>" . $searchnom . "</strong></div>";
while($row=$idRequete->fetch(PDO::FETCH_ASSOC)){
    echo '<tr><td class="warning">' . $row['nom'] . '</td><td class="success">' . $row['prenom'] . '</td><td><form method="get"><a href="details.php?id=' . $row['id_auteur'] . '"><i class="fa fa-folder text-infos"></i></a> <a href="update.php?id=' . $row['id_auteur'] . '"><i class="fa  fa-edit text-success"></i></a> <a href="delete.php?id=' . $row['id_auteur'] . '"><i class="fa  fa-close text-danger"></i></a></form></td></tr>';
}
}else{
    echo '<tr><td class="warning" colspan="4">La recherche : <strong>' . $searchnom . '</strong> n\'a retournée aucun enregistrements</td></tr>';
}
}else{ 
    echo '<tr><td class="danger" colspan="4"><strong>Aucune valeur saisie</strong></td></tr>';
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