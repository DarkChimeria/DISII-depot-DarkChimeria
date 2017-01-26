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
if(isset($_POST['btn-upload']))
{
     $pic = rand(1000,100000)."-".$_FILES['pic']['name'];
    $pic_loc = $_FILES['pic']['tmp_name'];
     $folder="uploaded_files/";
     if(move_uploaded_file($pic_loc,$folder.$pic))
     {
        ?><script>alert('successfully uploaded');</script><?php
     }
     else
     {
        ?><script>alert('error while uploading file');</script><?php
     }
}

?>

<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="pic" />
<button type="submit" name="btn-upload">upload</button>
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


