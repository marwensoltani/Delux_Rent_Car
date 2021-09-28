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

	<title>System de Location des Voitures - Affectation à un utilisateur</title>

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
</head>

<body>

	<div class="wrapper">

	    
		<?php include("../includes/sidebar.php"); ?>


	    <div class="main-panel">
	    		
	    	<?php include("../includes/navbar.php"); ?>
				
			<div class="content">
				<div class="container-fluid">					
				<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Véhicules</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Affectation à un utilisateur</h4>
                                </div>
                                <div class="card-content">

					<form method="POST" action="affecter_vehicule.php">
						<table class="table">
						<tr>
						 	<td>Utilisateur :</td>
						    <td><select size="1" name="personne" onChange="Detail(typevehicule.value)">
						  		<?php
						 			// Selection de tous les enregistrements de la table type materiel
						 			$requete = "Select IDINDIVIDU, NOMINDIVIDU, PRENOMINDIVIDU from individu where INTERNE='TRUE' and NOMINDIVIDU<>'admin' ";
						 			$resultat = mysqli_query($connect,$requete) or die ("Problème lors de choix des utilisateurs");
									while ($row = mysqli_fetch_row($resultat))
										echo "<option value=\"$row[0]\">$row[1] $row[2]</option>"
						 		?>
						 		</select>
							</td>
						</tr>
						<tr><td><br></td></tr>
						<tr>
							<td>Matricule du véhicule :</td>
							<td><select size="1" name="vehicule" onChange="Detail(typevehicule.value)">
						  		<?php
						 			// Selection de tous les enregistrements de la table type materiel
						 			$requete = "Select IDVEHICULE, IMMATRICULATIONVEHICULE from vehicule";
						 			$resultat = mysqli_query($connect,$requete) or die ("Problème lors de choix des utilisateurs");
									while ($row = mysqli_fetch_row($resultat))
										echo "<option value=\"$row[0]\">$row[1]</option>"
						 		?>
						 		</select>
							</td>
						</tr>
						<tr><td><br><br></td></tr>
						<tr align="center"><td colspan="3"><input type="submit" class="btn btn-success" name="Envoyer" value="Affecter"></td></tr>
						</table>
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
mysqli_close($connect);
?>