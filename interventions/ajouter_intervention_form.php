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

	<title>System de Location des Voitures - Ajouter une intervention</title>

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
					<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Reservations</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Ajouter une interventio</h4>
                                </div>
                                <div class="card-content">	

								<form name="ajout_vehicul" method="post" action="ajout_intervention.php">
								<table class="table">
									<tr>
										<td><span class="style4">Matricule :</span></td>
										<td>
											<?php
											$requete = "select idvehicule, immatriculationvehicule from vehicule";
											$resultat = mysqli_query($connect,$requete);
											echo "<select name=\"vehicule\">";
											while($row = mysqli_fetch_array($resultat))
												echo "<option value=\"$row[0]\">$row[1]</option>";
											echo "</select>";
											?>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Panne :</span></td>
										<td>
											<?php
											$requete = "select idpanne, libellepanne from panne";
											$resultat = mysqli_query($connect,$requete);
											echo "<select name=\"panne\">";
											while($row = mysqli_fetch_array($resultat))
												echo "<option value=\"$row[0]\">$row[1]</option>";
											echo "</select>";
											?>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Intervenant :</span></td>
										<td>
											<?php
											$requete = "select idindividu, nomindividu, prenomindividu from individu where interne=0";
											$resultat = mysqli_query($connect,$requete);
											echo "<select name=\"individu\">";
											echo "<option value=\"NULL\">Pas d'intervenant</option>";
											while($row = mysqli_fetch_array($resultat))
												echo "<option value=\"$row[0]\">$row[1] $row[2]</option>";
											echo "</select>";
											?>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Date Problème :</span></td>
										<td>
											<?php
											echo "<select name=\"jourprobleme\">";
											for($i=1;$i<32;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>&nbsp;&nbsp;";
											echo "<select name=\"moisprobleme\">";
											for($i=1;$i<13;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>&nbsp;&nbsp;";
											echo "<select name=\"anneeprobleme\">";
											for($i=2000;$i<2020;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>";
											?>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Date Intervention :</span></td>
										<td>
											<?php
											echo "<select name=\"jourintervention\">";
											for($i=1;$i<32;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>&nbsp;&nbsp;";
											echo "<select name=\"moisintervention\">";
											for($i=1;$i<13;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>&nbsp;&nbsp;";
											echo "<select name=\"anneeintervention\">";
											for($i=2000;$i<2020;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>";
											?>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Duree :</span></td>
										<td>
											<?php
											echo "<select name=\"duree\">";
											for($i=1;$i<=200;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>";
											?><b> en H</b>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Compte Rendu :</span></td>
										<td>
										<textarea name="compterendu" rows="4"></textarea>
										</td>
									</tr>
								</table><br>
								<div align="right"><input class='btn btn-info' type ="submit" value="Enregistrer"></div>
						</form>
						</div>
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