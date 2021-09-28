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

	<title>System de Location des Voitures - Modifier intervenation</title>

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
                                    <h4 class="title">Modifier intervention</h4>
                                    	<?php
						$intervention=$_GET["code"];
						$requete="select * from intervention where idintervention='$intervention'";
						$resultat=mysqli_query($connect,$requete) or die(mysqli_error());
						$row=mysqli_fetch_array($resultat);
						//Titre de la page
						echo "<p class=categorie>Modification de l'intervention N°".$intervention."</p>";
						?>
                                </div>
                                <div class="card-content">	

						<form action="modifier_intervention.php" method="POST">
					
						<input type="hidden" name="code" value="<?php echo $intervention?>">
						<table class='table'>
						<tr>
							<td>
								<span class="style4">Matricule du véhicule : </span>
							</td>
							<td>
								<input name="vehicule" type="text" readonly="1" value="
								<?php 
								$resultat1=mysqli_query($connect,"select immatriculationvehicule from vehicule where idvehicule='".$row[1]."'");
								$row1 = mysqli_fetch_row($resultat1);
								echo $row1[0];
								?>
								">
							</td>
						</tr>
						<tr><td height="8"></td></tr>
						<tr>
							<td>
								<span class="style4">Libelle du panne : </span>
							</td>
							<td>
								<select name="panne">
								<?php
								$resultat1 = mysqli_query($connect,"select * from panne");
								while($row1 = mysqli_fetch_row($resultat1))
									echo "<option value=\"$row1[0]\">$row1[1]</option>";
								?>
								</select>
							</td>
						</tr>
						<tr><td height="8"></td></tr>
						<tr>
							<td>
								<span class="style4">Intervenant : </span>
							</td>
							<td>
								<select name="intervenant">
								<?php
								$resultat1 = mysqli_query($connect,"select idindividu, nomindividu, prenomindividu from individu where interne=0");
								while($row1 = mysqli_fetch_row($resultat1))
									echo "<option value=\"$row1[0]\">$row1[1] $row1[2]</option>";
								?>
								</select>
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
							<textarea name="compterendu" rows="4"><?php echo $row[7];?></textarea>
							</td>
						</tr>
						</table>
						<input type="button"  class='btn btn-info' value="Retour" onClick="window.location='liste_intervention.php';">
						<input name="valider"  class='btn btn-primary' type="submit" value="Modifier">
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
