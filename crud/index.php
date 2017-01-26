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
			
			
			
			<br>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>