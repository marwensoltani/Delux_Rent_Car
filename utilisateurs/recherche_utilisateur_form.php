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

	<title>System de Location des Voitures - Recherche d'utilisateur</title>

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
					<h1>Recherche d'utilisateur</h1>

							<a href="liste_utilisateur.php" class="btn btn-info">Liste des Utilisateurs</a>
							<a href="recherche_utilisateur_form.php" class="btn btn-info">Recherche un utilisateur</a>
							<a href="affecter_vehicule_form.php" class="btn btn-info">Affecter un véhicule</a>

								<table border="0">
								<tr>
									<td>
										<form method="POST" action="recherche_par_nom.php">
										<table align="center">
											<tr>
												<td align="center" class="style4">Nom de l'utilisateur : </td>
											</tr>
											<tr><td><br></td></tr>
											<tr>	
												<td align="right">
												<b>Entrer le nom : </b><input type="text" name="nom">
												</td>
											</tr>
											<tr>
												<td align="right">
												<b>Entrer le prénom : </b><input type="text" name="prenom">
												</td>
											</tr>
											<tr><td><br></td></tr>
											<tr>
												<td colspan="2" align="center">
												<input type="submit" name="Envoyer" value="Rechercher">
												</td>
											</tr>
										</table>
										</form>
									</td>
									<td width="100"></td>
									<td>
										<form method="POST" action="recherche_par_matricule.php">
										<table align="center">
											<tr>
												<td align="center" class="style4">Matricule : </td>
											</tr>
											<tr><td><br></td></tr>
											<tr>
												<td align="right">
												<b>Entrer le matricule : </b><input type="text" name="matricule">
												</td>
											</tr>
											<tr><td><br></td></tr>
											<tr>
												<td colspan="2"  align="center">
												<input type="submit" name="Envoyer" value="Rechercher">
												</td>
											</tr>
											<tr><td><br></td></tr>
										</table>
										</form>
									</td>
								</tr>
						</table>
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