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

	<title>System de Location des Voitures - Ajout reservation</title>

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
                                    <h4 class="title">Ajout reservation</h4>
                                </div>
                                <div class="card-content">
									<form action="ajouter_reservation.php" method="POST">
									<table class="table">
									<tr>
										<td>
										<span class="style4">Nom du demandeur : </span>
										</td>
										<td>
											<select name="nom">
											<?php
											$resultat1 = mysqli_query($connect,"select idindividu, nomindividu, prenomindividu from individu where interne=1 and nomindividu<>'admin'");
											while($row1 = mysqli_fetch_array($resultat1))
												echo "<option value=\"$row1[0]\">$row1[1] $row1[2]</option>";
											?>
											</select>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									
									<tr><td height="8"></td></tr>
									<tr>
										<td>
										<span class="style4">Objectif : </span>
										</td>
										<td>
											<input type="text" name="objectif">
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Km :</span></td>
										<td>
											<input type="text" name="km">
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Qte Carburant :</span></td>
										<td>
											<input type="text" name="qte">
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td>
										<span class="style4">Date Réservation :</span>
										</td>
										<td>
											<?php
											echo "<select name=\"jour\">";
											for($i=1;$i<32;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>&nbsp;&nbsp;";
											echo "<select name=\"mois\">&nbsp;&nbsp;";
											for($i=1;$i<13;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>&nbsp;&nbsp;";
											echo "<select name=\"annee\">";
											for($i=2000;$i<2020;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>";
											?>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td>
										<span class="style4">Date Fin de réservation :</span>
										</td>
										<td>
											<?php
											echo "<select name=\"jourfin\">";
											for($i=1;$i<32;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>&nbsp;&nbsp;";
											echo "<select name=\"moisfin\">&nbsp;&nbsp;";
											for($i=1;$i<13;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>&nbsp;&nbsp;";
											echo "<select name=\"anneefin\">";
											for($i=2000;$i<2020;$i++)
												echo "<option value=\"$i\">$i</option>";
											echo "</select>";
											?>
										</td>
									</tr>
									<tr><td height="16"></td></tr>
									</table>
									<div align="right">
										<input type="button" value="Retour" class="btn btn-default" onClick="window.location='liste_reservation.php';">
										<input name="valider" type="submit" class="btn btn-success" value="Enregistrer">
									</div>
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
