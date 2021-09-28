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

	<title>System de Location des Voitures - Liste intervention</title>

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
						<script language="Javascript">
						function imprimer(){window.print();}
						</script>

						<a href="ajouter_intervention_form.php" class="btn btn-success">Ajouter une intervention</a>
						<a href="##" onClick="imprimer()" class="btn-info btn">Imprimer cette page</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="orange">
                                    <h4 class="title">Liste des interventions</h4>   
                                </div>
                                <div class="card-content">
                                	<div class="table-responsive table-upgrade">
                                        <table class="table">
											<tr>
												<td>											
													<form method="POST" action="recherche_par_matricule.php">
													<table class="table">
														<tr>
															<td><b>Matricule du véhicule : </b></td>
														</tr>
														<tr>	
															<td>
																<?php
																$requete = mysqli_query($connect,"SELECT idvehicule, immatriculationvehicule
																							FROM vehicule");
																?>
																<select name="matricule" id="matricule">
																<?php
																	while($row = mysqli_fetch_array($requete)) {
																?>
																<option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>
																<?php
																	}
																?>
																</select>
															</td>
														</tr>
														<tr>
															<td colspan="2"><input type="submit"  class='btn btn-primary' name="Envoyer" value="Rechercher"></td>
														</tr>
													</table>
													</form>
												</td>
												<td width="100"></td>
												<td>
												<form method="POST" action="recherche_par_intervenant.php">
												<table class="table">
												<tr>
													<td><b>Nom de l'intervenant : </b></td>
												</tr>	
												<tr>
													<td><?php
														$requete = mysqli_query($connect,"select idindividu, nomindividu, prenomindividu from individu where interne=0");
														?>
														<select name="intervenant" id="intervenant">
														<?php
															while($row = mysqli_fetch_array($requete)) {
														?>
														<option value="<?php echo $row[0]; ?>" selected><?php echo $row[1].' '.$row[2]; ?>
														</option>
														<?php
														}
														?>
														</select>
													</td>
												</tr>
												<tr>
													<td colspan="2" ><input type="submit" class='btn btn-primary' name="Envoyer" value="Rechercher"></td>
												</tr>
												</table></form>
												</td>
												<td width="100"></td>
												<td>
													<form method="POST" action="recherche_par_date.php">
														<table class="table">
														<tr align="">
															<td><b>Date intervention entre le :</b></td>
														</tr>	
														<tr>
															<td>
																<?php
																echo "<select name=\"jourdebut\">";
																for($i=1;$i<32;$i++)
																	echo "<option value=\"$i\">$i</option>";
																echo "</select>&nbsp;&nbsp;";
																echo "<select name=\"moisdebut\">";
																for($i=1;$i<13;$i++)
																	echo "<option value=\"$i\">$i</option>";
																echo "</select>&nbsp;&nbsp;";
																echo "<select name=\"anneedebut\">";
																for($i=2000;$i<2020;$i++)
																	echo "<option value=\"$i\">$i</option>";
																echo "</select>";
																?>
															</td>
														</tr>
														<tr>
															<td><b>Et le :</b></td>
														</tr>
														<tr>
															<td>
																<?php
																echo "<select name=\"jourfin\">";
																for($i=1;$i<32;$i++)
																	echo "<option value=\"$i\">$i</option>";
																echo "</select>&nbsp;&nbsp;";
																echo "<select name=\"moisfin\">";
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
														<tr>
															<td colspan="2" ><input type="submit" class='btn btn-primary' name="Envoyer" value="Rechercher"></td>
														</tr>
														</table>
													</form>
												</td>
											</tr>
										</table>
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