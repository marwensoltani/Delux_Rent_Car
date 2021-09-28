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

	<title>System de Location des Voitures - Recherche intervenation par matricule</title>

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
                                    <h4 class="title">Recherche intervenation par matricule</h4>	

						<?php
						$matricule=$_POST['matricule'];
						$requete = "select immatriculationvehicule from vehicule where idvehicule='".$matricule."'";
						$resultat = mysqli_query($connect,$requete);
						$row = mysqli_fetch_row($resultat);
						?>
						<p class="categorie">Recherche d'intervention sur <?php echo $row[0]?></p>
						 </div>
		                                <div class="card-content">
		                                	<div class="table-responsive table-upgrade">
		                                        <table class="table">
											<thead>
											    <tr>
													<th>Nom de l'intervenant</th>
													<th>Problème</th>
													<th>Date du problème</th>
													<th>Date intervention</th>
													<th>Durée intervention</th>
													<th>Compte-rendu</th>
													<th>Modification</th>
												</tr>
											</thead>
											<tbody>
						<?php
						$requete = "select idpanne, idindividu, dateprobintervention, dateintervention, dureeintervention, compterenduintervention, idintervention
						from intervention
						where idvehicule='".$matricule."'";
						$resultat = mysqli_query($connect,$requete) or die("erreur dans la requete : " . $requete);

							while($row=mysqli_fetch_array($resultat))
							{
							$requete1 = "select nomindividu, prenomindividu from individu where idindividu='".$row[1]."'";
							$resultat1 = mysqli_query($connect,$requete1) or die(mysqli_error());
							$row1=mysqli_fetch_row($resultat1);
							$nomintervenant=$row1[0];
							$prenomintervenant = $row1[1];
							$requete1 = "select libellepanne from panne where idpanne='".$row[0]."'";
							$resultat1 = mysqli_query($connect,$requete1) or die(mysqli_error());
							$row1=mysqli_fetch_row($resultat1);
							$probleme=$row1[0];
							$dateprobleme=$row[2];
							//list($y,$m,$d) = explode('-', $date_probleme);
							//$date_probleme=$d.'/'.$m.'/'.$y; // date au format françai
							$dateintervention=$row[3];
							// $date_intervention est une valeur récupérée au format YYYY-MM-DD
							//list($y,$m,$d) = explode('-', $date_intervention);
							//$date_intervention=$d.'/'.$m.'/'.$y; // date au format français
							$dureeintervention=$row[4];
							$compterendu=$row[5];
							$code=$row[6];
							?>
							<tr>
								<td align="center">
									<?php echo $nomintervenant.' '.$prenomintervenant;?>
								</td>
								<td align="center">
									<?php echo $probleme;?>
								</td>
								<td align="center">
									<?php echo $dateprobleme;?>
								</td>  	
								<td align="center">
									<?php echo $dateintervention;?>
								</td>
								<td align="center">
									<?php echo $dureeintervention.'H';?>
								</td>
								<td align="center">
									<?php echo $compterendu;?>
								</td>
								<td align="center">
									<a href=modifier_intervention_form.php?code=<?php echo $code?> target="bas" title="Modifier" class="style5"><i class='material-icons'>mode_edit</i></a>
								</td>
							</tr>
							<?php
							}
							?>
							</tbody>
					</table>
						<input type="button" class='btn btn-info' value="Retour" onClick="window.location='liste_intervention.php'"></input>
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
