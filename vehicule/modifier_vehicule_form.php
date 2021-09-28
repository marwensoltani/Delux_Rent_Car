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

	<title>System de Location des Voitures - Modifier Vehicule</title>

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
					<a href="##" onClick="imprimer()" class="btn-info btn">Imprimer cette page</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Modifier Vehicule</h4>
                                </div>
                                <div class="card-content">
									<form name="modifier_vehicule" method="post" action="modifier_vehicule.php">
										<?php
										//requete de recherche du materiel
										$vehicule=$_GET["code"];
										$requete1="select IDVEHICULE, IMMATRICULATIONVEHICULE, LIBELLETYPECARBURANT, PUISSANCEVEHICULE, CARTEGRISEVEHICULE, NBRPORTEVEHICULE, LIBELLEMODELE, LIBELLETYPEVEHICULE, PATHPHOTOVEHICULE 
										from vehicule v , typeCarburant t, modele m, typevehicule tv
										where t.IDTYPECARBURANT=v.IDTYPECARBURANT
										and m.IDMODELE=v.IDMODELE
										and tv.IDTYPEVEHICULE=v.IDTYPEVEHICULE
										and v.IDVEHICULE='".$vehicule."'";
										$resultat1=mysqli_query($connect,$requete1) or die(mysqli_error());
										while ($row1=mysqli_fetch_array($resultat1))
										{
											$idvehicule=$row1[0];
											$matricule=$row1[1];
											$libellecarburant=$row1[2];
											$puissance=$row1[3];
											$cartegrise=$row1[4];
											$nbrporte=$row1[5];
											$modele=$row1[6];
											$statut=$row1[7];
											$photo=$row1[8];
										}
										echo "<h4>Modification des caractéristiques du Véhicule ".$matricule."</h4>";
										?>
										<input type="hidden" name="vehicule" value="<?php echo $vehicule?>">
										<table class="table">
											<tr>
												<td align="right">Carburant :</td>
												<td><input type="text" name="libellecarburant" value="<?php echo $libellecarburant?>" readonly="1"></td>
												<td align="right">Puissance : </td>
												<td><input type="text" name="puissance" value="<?php echo $puissance?>" readonly="1"></td>
											</tr>
											<tr>
												<td align="right">Carte grise :</td>
												<td><input type="text" name="cartegrise" value="<?php echo $cartegrise?>" readonly="1"></td>
												<td align="right">Nombre de porte :</td>
												<td><input type="text" name="nbrporte" maxlength="10" value="<?php echo $nbrporte?>" readonly="1"></td>
											</tr>
											<tr>
												<td align="right">Modele :</td>
												<td><input type="text" name="modele" value="<?php echo $modele?>" readonly="1"></td>
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
												<td align="right">Site géographique :</td>
												<td>
													<?php 
													$requete4 = mysqli_query($connect,"SELECT * FROM site");
													echo "<select name=\"site\" id=\"site\">";
													while($resultat4 = mysqli_fetch_array($requete4))
														echo "<option value=\"$resultat4[0]\">$resultat4[1]</option>";
													echo "</select>";
													?>
												</td>
											</tr>
										</table><br>
										<input  class="btn btn-fill btn-info" type ="submit" value="Enregistrer"><br>
										</form>
										<hr><br>
										<form name="modifier_assurance_vehicule" method="post" action="modifier_assurance_vehicule.php">
										<input type="hidden" name="vehicule" value="<?php echo $vehicule?>">
										<h4>Assurance du véhicule <?php echo $matricule?></h4>
										<table class="table">
										    <tr>
												<td colspan="8" size="+1" class="style3"><b>Date Debut Assurance</b><br><br></td>
											</tr>
											<tr>
												<td>Jour :</td>
												<td>
													<?php
													echo "<select name=\"jourassurance\" id=\"jourassurance\">";
													for( $i=1; $i<32; $i++ )
														echo "<option value=\"$i\">$i</option>";
													echo "</select>";
													?>
												</td>
												<td width="40"></td>
												<td>Mois :</td>
												<td>
													<?php
													echo "<select name=\"moisassurance\" id=\"moisassurance\">";
													for( $i=1; $i<13; $i++ )
														echo "<option value=\"$i\">$i</option>";
													echo "</select>";
													?>
												</td>
												<td width="40"></td>
												<td>Année :</td>
												<td>
													<?php 
													echo "<select name=\"anneeassurance\" id=\"anneeassurance\">";
													for ( $i=2008; $i<2040; $i++ )
														echo "<option value=\"$i\">$i</option>";
													echo "</select>";
													?>
												</td>
										    </tr>
											<tr><td><br></td></tr>
											<tr>
												<td colspan="8" size="+1" class="style3"><b>Date Fin Assurance</b><br><br></td>
											</tr>
											<tr>
												<td>Jour :</td>
												<td>
													<?php
													echo "<select name=\"jourfinassurance\" id=\"jourfinassurance\">";
													for( $i=1; $i<32; $i++ )
														echo "<option value=\"$i\">$i</option>";
													echo "</select>";
													?>
												</td>
												<td width="40"></td>
												<td>Mois :</td>
												<td>
													<?php
													echo "<select name=\"moisfinassurance\" id=\"moisfinassurance\">";
													for( $i=1; $i<13; $i++ )
														echo "<option value=\"$i\">$i</option>";
													echo "</select>";
													?>
												</td>
												<td width="40"></td>
												<td>Année :</td>
												<td>
													<?php 
													echo "<select name=\"anneefinassurance\" id=\"anneefinassurance\">";
													for ( $i=2008; $i<2040; $i++ )
														echo "<option value=\"$i\">$i</option>";
													echo "</select>";
													?>
												</td>
										    </tr>
											<tr><td><br></td></tr>
											<tr>
												<td colspan="8" size="+1" class="style3"><b>Coût Assurance</b></td>
											</tr>
											<tr>
												<td colspan="8">
													<?php
													$requete4= mysqli_query($connect,"select COUTASSURANCE FROM vehicule where IDVEHICULE='".$vehicule."'");
													$resultat4 = mysqli_fetch_row($requete4);
													?>
													<input type="text" name="coutassurance" maxlength="10" value="<?php echo $resultat4[0]?>">DH
												</td>
											</tr>
											<tr><td><br></td></tr>
										</table>
										<div><input class="btn btn-fill btn-info" type ="submit" value="Enregistrer"></div>
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