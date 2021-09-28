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

	<title>System de Location des Voitures - Modifier Sinistre</title>

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
			<?php
				$sinistre=$_GET["code"];
				//requête de travail
				$requete="select lieusinistre, datesinistre, degatmatsinistre, degatcorsinistre, nbrdecessinistre
				from sinistre where idsinistre='".$sinistre."'";
				$resultat = mysqli_query($connect,$requete) or die(mysqli_error());
				$row = mysqli_fetch_array($resultat);
			?>		
			<div class="content">
				<div class="container-fluid">
					<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Sinistre</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Modification Sinistre</h4>
                                    <p class="categorie"><?php echo "MModification du sinistre N° ".$sinistre; ?></p>
                                </div>
                                <div class="card-content">
									<form action="modifier_sinistre.php" method="POST">

										<input type="hidden" name="code" value="<?php echo $sinistre?>">
										<table class="table">
										<tr>
											<td>
											<span class="style4">Nom du responsable : </span>
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
										<tr>
											<td>
											<span class="style4">Matricule véhicule : </span>
											</td>
											<td>
												<select name="matricule">
												<?php
												$resultat1 = mysqli_query($connect,"select idvehicule, immatriculationvehicule from vehicule");
												while($row1 = mysqli_fetch_array($resultat1))
													echo "<option value=\"$row1[0]\">$row1[1]</option>";
												?>
												</select>
											</td>
										</tr>
										<tr><td height="8"></td></tr>
										<tr>
											<td>
											<span class="style4">Lieu : </span>
											</td>
											<td>
												<input type="text" name="lieu" value="<?php echo $row[0]?>">
											</td>
										</tr>
										<tr><td height="8"></td></tr>
										<tr>
											<td>
											<span class="style4">Date : </span>
											</td>
											<td>
												<?php
												echo "<select name=\"jour\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<32;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"mois\">&nbsp;&nbsp;";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<13;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"annee\">";
												echo "<option value=\"0\"></option>";
												for($i=2000;$i<2020;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr><td height="8"></td></tr>
										<tr>
											<td><span class="style4">Dégât matériel :</span></td>
											<td>
												<textarea name="degatmateriel"><?php echo $row[2];?></textarea>
											</td>
										</tr>
										<tr><td height="8"></td></tr>
										<tr>
											<td><span class="style4">Dégât corporel :</span></td>
											<td>
												<textarea name="degatcorporel"><?php echo $row[3];?></textarea>
											</td>
										</tr>
										<tr><td height="8"></td></tr>
										<tr>
											<td><span class="style4">Nombre de décès :</span></td>
											<td><input type="text" name="nbrdeces" value="<?php echo $row[4];?>"></td>
										</tr>
										<tr><td height="16"></td></tr>
										</table>
										<div align="right">
											<input type="button" class='btn btn-info' value="Retour" onClick="window.location='liste_sinistre.php';">
											<input name="valider" class='btn btn-success' type="submit" value="Modifier">
										</div>
									</form>
								</div>
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