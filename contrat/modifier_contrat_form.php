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

	<title>System de Location des Voitures - Modification contrat</title>

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
			$contrat=$_GET["code"];
			//requête de travail
			$requete="select idcontrat, nomfournisseur, libelletypecontrat, immatriculationvehicule, datedebcontrat, datefincontrat, montantcontrat
			from contrat c, typecontrat t, vehicule v, fournisseur f
			where c.idtypecontrat=t.idtypecontrat and f.idfournisseur=c.idfournisseur and v.idvehicule=c.idvehicule and idcontrat='$contrat'";
			$resultat = mysqli_query($connect,$requete) or die(mysqli_error());
			$row = mysqli_fetch_array($resultat);
			$code=$row[0];
			$nom=$row[1];
			$libelletc=$row[2];
			$matricule=$row[3];
			$debutcontrat=$row[4];
			$fincontrat=$row[5];
			$montantcontrat=$row[6];
			?>	
			<div class="content">
				<div class="container-fluid">
					<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Contrats</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Modification Contrat</h4>
                                    <p class="categorie"><?php echo "Modification du contrat N° ".$code; ?></p>
                                </div>
                                <div class="card-content">

									<form action="modifier_contrat.php" method="POST">
	
									<input type="hidden" name="code" value="<?php echo $code?>">
									<table class="table">
									<tr>
										<td>
										<span class="style4">Nom du fournisseur : </span>
										</td>
										<td>
											<select name="fournisseur">
											<?php
											$resultat1 = mysqli_query($connect,"select idfournisseur, nomfournisseur from fournisseur");
											while($row1 = mysqli_fetch_array($resultat1))
												echo "<option value=\"$row1[0]\">$row1[1]</option>";
											?>
											</select>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td>
										<span class="style4">Type contrat : </span>
										</td>
										<td>
											<select name="contrat">
											<?php
											$resultat1 = mysqli_query($connect,"select * from typecontrat");
											while($row1 = mysqli_fetch_array($resultat1))
												echo "<option value=\"$row1[0]\">$row1[1]</option>";
											?>
											</select>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td>
										<span class="style4">Matricule du véhicule : </span>
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
										<span class="style4">Date début contrat : </span>
										</td>
										<td><?php
												echo "<select name=\"jourcontrat\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<32;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"moiscontrat\">&nbsp;&nbsp;";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<13;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"anneecontrat\">";
												echo "<option value=\"0\"></option>";
												for($i=2000;$i<2020;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>";
												?>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Date de fin de contrat :</span></td>
										<td><?php
												echo "<select name=\"jourfin\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<32;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"moisfin\">";
												echo "<option value=\"0\"></option>";
												for($i=1;$i<13;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>&nbsp;&nbsp;";
												echo "<select name=\"anneefin\">";
												echo "<option value=\"0\"></option>";
												for($i=2000;$i<2020;$i++)
													echo "<option value=\"$i\">$i</option>";
												echo "</select>";
												?>
										</td>
									</tr>
									<tr><td height="8"></td></tr>
									<tr>
										<td><span class="style4">Montant du contrat :</span></td>
										<td><input type="text" name="montant"></td>
									</tr>
									<tr><td height="16"></td></tr>
									</table>
									<div align="right">
										<input type="button" class="btn btn-default" value="Retour" onClick="window.location='liste_contrat.php';">
										<input name="valider" class="btn btn-success" type="submit" value="Modifier">
									</div>
									</form>
									<?
									mysqli_close($connect); 
									?>
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