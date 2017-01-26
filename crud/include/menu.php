<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">MENU</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
		</button> <a class="navbar-brand" href="listeAuteur.php">HOME</a>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li class="active">
				<a href="#">Liste des auteurs</a>
			</li>
			<li>
				<a href="formAjout.php">Ajout d'un auteur</a>
			</li>
		</ul>
		<form class="navbar-form navbar-left" method="POST" action="recherche.php">
		<button type="submit" class="btn btn-info" name="rvalider">
				Rechercher
			</button>
			<div class="form-group">
				<input class="form-control" type="text" name="search">
			</div> 
			<i class="fa  fa-sort-alpha-asc text-success"> </i> <input type="radio" name="tri" value="ASC">
			<i class="fa  fa-sort-alpha-desc text-danger"> </i> <input type="radio" name="tri" value="DESC">
			<i class="fa fa-close text-warning"> </i> <input type="radio" name="tri" value="">

		</form>

	</div>

</nav>



