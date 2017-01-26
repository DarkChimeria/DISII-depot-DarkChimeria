<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">MENU</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
		</button> <a class="navbar-brand" href="index.php">HOME</a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="active">
				<a href="listeAuteur.php">Liste des auteurs</a>
			</li>
			<li>
				<a href="formAjout.php">Ajout d'un auteur</a>
			</li>
			<li>
				<a href="upload.php">Upload</a>
			</li>
		</ul>
		<form class="navbar-form navbar-left" method="POST" action="recherche.php">
			<div class="form-group">
				<input class="form-control" type="text" name="search">
			</div> 
			<select name="tri">
				<option value="nom">Nom</option>
				<option value="prenom">Prénom</option>
				<option value="date_naissance">Date de Naissance</option>
			</select>
			<i class="fa  fa-sort-alpha-asc text-success"> </i> <input type="radio" name="order" value="ASC">
			<i class="fa  fa-sort-alpha-desc text-danger"> </i> <input type="radio" name="order" value="DESC">
			<button type="submit" class="btn btn-info" name="rvalider">
				Rechercher
			</button>
		</form>

	</div>

</nav>



