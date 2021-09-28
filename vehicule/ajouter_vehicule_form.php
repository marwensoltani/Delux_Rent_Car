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

	<title>System de Location des Voitures - Ajouter un véhicule</title>

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
                                    <h4 class="title">Ajouter un véhicule</h4>
                                </div>
                                <div class="card-content">

									<form name="ajout_vehicul" method="post" action="ajout_vehicule.php">
									<table class="table">
										<tr>
											
											<td align="right">Nombre de porte :</td>
											<td><input type="text" name="nbrporte"></td>
										</tr>
										<tr>
											<td align="right">Puissance :</td>
											<td><input type="text" name="puissance"></td>
											<td align="right">Nombre de place :</td>
											<td><input type="text" name="nbrplace"></td>
										</tr>
										<tr>
											<td align="right">Numero de carte grise :</td>
											<td><input type="text" name="cartegrise"></td>
											
										</tr>
										<tr>
											<td align="right">Date d'acquisition :</td>
											<td>
												<?php
												echo "<select name=\"jouracquisition\">";
												for($i=1;$i<32;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"moisacquisition\">";
												for($i=1;$i<13;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"anneeacquisition\">";
												for($i=2000;$i<2020;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>";
												?>
											</td>
											<td align="right">Categorie :</td>
											<td>
												<?php
												$requete = mysqli_query($connect,"select * from categorie");
												echo "<select name=\"categorie\" id=\"categorie\">";
												while($resultat = mysqli_fetch_array($requete))
													echo "<option value=\"$resultat[0]\">$resultat[1]</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr>
											<td align="right">Service :</td>
											<td>
												<?php 
												$requete3 = mysqli_query($connect,"SELECT IDSERVICE, LIBELLESERVICE FROM service");
												echo "<select name=\"service\" id=\"service\">";
												echo "<option value=\"NULL\">Aucun Service</option>";
												while($resultat3 = mysqli_fetch_array($requete3))
													echo "<option value=\"$resultat3[0]\">$resultat3[1]</option>";
												echo "</select>";
												?>
											</td>
											<td align="right">Statut :</td>
											<td><?php 
												$requete2 = mysqli_query($connect,"SELECT * FROM typevehicule");
												echo "<select name=\"typevehicule\" id=\"typevehicule\">";
												while($resultat2 = mysqli_fetch_array($requete2))
													echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr>
											<td align="right">Modèle :</td>
											<td><?php 
												$requete2 = mysqli_query($connect,"SELECT * FROM modele");
												echo "<select name=\"modele\" id=\"modele\">";
												while($resultat2 = mysqli_fetch_array($requete2))
													echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
												echo "</select>";
												?>
											</td>
											<td align="right">Type Carburant :</td>
											<td><?php 
												$requete2 = mysqli_query($connect,"SELECT * FROM typecarburant");
												echo "<select name=\"typecarburant\" id=\"typecarburant\">";
												while($resultat2 = mysqli_fetch_array($requete2))
													echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr>
											<td align="right">Site géographique :</td>
											<td><?php 
												$requete2 = mysqli_query($connect,"SELECT * FROM site");
												echo "<select name=\"site\" id=\"site\">";
												while($resultat2 = mysqli_fetch_array($requete2))
													echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr><td><br></td></tr>
										<tr>
											<td colspan="4"><span class="style3"><b>Assurance :</b></span></td>
										</tr>
										<tr>
											<td colspan="2">Date début d'assurance :</td>
											<td colspan="2"><?php
												echo "<select name=\"jourassurance\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<32;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"moisassurance\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<13;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"anneeassurance\">";
												echo "<option value=\"0\"></option>";
												for($i=2000;$i<2020;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr>
											<td colspan="2">Date de fin d'assurance :</td>
											<td colspan="2"><?php
												echo "<select name=\"jourfinassurance\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<32;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"moisfinassurance\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<13;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"anneefinassurance\">";
												echo "<option value=\"0\"></option>";
												for($i=2000;$i<2020;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr>
											<td colspan="2">Coût d'assurance :</td>
											<td colspan="2"><input type="text" name="coutassurance"></td>
										</tr>
										<tr>
											<td colspan="2">Assureur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
											<td colspan="2"><?php 
												$requete2 = mysqli_query($connect,"SELECT * FROM fournisseur");
												echo "<select name=\"fournisseur\" id=\"fournisseur\">";
												echo "<option value=\"NULL\">Non encore assuré</option>";
												while($resultat2 = mysqli_fetch_array($requete2))
													echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr><td><br></td></tr>
										<tr>
											<td colspan="4"><span class="style3"><b>Contrat Réparation :</b></span></td>
										</tr>
										<tr>
											<td colspan="2">Date début de contrat :</td>
											<td colspan="2"><?php
												echo "<select name=\"jourreparation\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<32;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"moisreparation\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<13;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"anneereparation\">";
												echo "<option value=\"0\"></option>";
												for($i=2000;$i<2020;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr>
											<td colspan="2">Date de fin de contrat :</td>
											<td colspan="2"><?php
												echo "<select name=\"jourfinreparation\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<32;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"moisfinreparation\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<13;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"anneefinreparation\">";
												echo "<option value=\"0\"></option>";
												for($i=2000;$i<2020;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>";
												?>
											</td>
										</tr>
										<tr>
											<td colspan="2">Coût de contrat :</td>
											<td colspan="2"><input type="text" name="coutreparation"></td>
										</tr>
										<tr>
											<td colspan="2">Atelier de Réparation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
											<td colspan="2"><?php 
												$requete2 = mysqli_query($connect,"SELECT * FROM fournisseur");
												echo "<select name=\"fournisseur2\" id=\"fournisseur2\">";
												echo "<option value=\"NULL\">Pas de contrat</option>";
												while($resultat2 = mysqli_fetch_array($requete2))
													echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
												echo "</select>";
												?>
											</td>
										</tr>
									</table><br>
									<div><input class="btn btn-fill btn-info"  type ="submit" value="Enregistrer"></div>
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

<?php
// deconnexion de la base
mysqli_close($connect);
?>