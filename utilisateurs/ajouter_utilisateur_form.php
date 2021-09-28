<?php session_start(); 
include("../includes/config.php");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>System de Location des Voitures - Ajouter un utilisateur</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <script language="Javascript">
	function imprimer(){window.print();}
	</script>
</head>

<body>

	<div class="wrapper">

	    
		<?php include("../includes/sidebar.php"); ?>


	    <div class="main-panel">
	    		
	    	<?php include("../includes/navbar.php"); ?>
				
			<div class="content">
				<div class="container-fluid">
					

							<a href="liste_utilisateur.php" class="btn btn-info">Liste des Utilisateurs</a>
							<a href="recherche_utilisateur_form.php" class="btn btn-info">Recherche un utilisateur</a>
							<a href="affecter_vehicule_form.php" class="btn btn-info">Affecter un véhicule</a>
							<div class="col-lg-12 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="orange">
	                                <h4 class="title">Ajouter un utilisateur</h4>	 
	                                <p class="category">Récapitulatif sur l'utilisateur :  </p>                             
	                            </div>

							<form name="ajout_utilisateur" method="post" action="ajout_utilisateur.php">
							 <div class="card-content table-responsive">
                                <table class="table">
									<tr>
										<td align="right">Nom :</td>
										<td><input type="text" name="nom"></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td align="right">Prénom :</td>
										<td><input type="text" name="prenom"></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td align="right">Téléphone :</td>
										<td><input type="text" name="tel" maxlength="10"></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td align="right">C.I.N :</td>
										<td><input type="text" name="cin"></td>
									</tr>
									<tr><td><br></td></tr>
									<tr>
										<td align="right">Interne :</td>
										<td>
											<select name="interne">
												<option value="1">Interne</option>
												<option value="0">Intervenant</option>
											</select>
										</td>
									</tr>
								</table>
								<button type="submit" class="btn btn-primary pull-right">Enregistrer</button>
						</form>
						</div>
					</div>
				</div>
			</div>

			<?php include("../includes/footer.php"); ?>
		</div>
	</div>

</body>

	<?php include("../includes/script.php"); ?>

</html>

<?php
// deconnexion de la base
mysqli_close($connect);
?>