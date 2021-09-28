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

	<title>System de Location des Voitures - Liste des réservations</title>

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
						<a href="ajouter_reservation_form.php" class="btn-success btn">Ajouter une reservation</a>
						<a href="##" onClick="imprimer()" class="btn-info btn">Imprimer cette page</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="orange">
                                    <h4 class="title">Liste des réservations</h4>   
                                </div>
                                <div class="card-content">
                                	<div class="table-responsive table-upgrade">
                                        <table class="table">
                                            <thead>
				                                <th>Nom Responsable</th>
												<th>Matricule véhicule</th>
												<th>Objectif</th>
												<th>Km parcouru</th>
												<th>Qte Carburant</th>
												<th>Date début</th>
												<th>Date fin</th>
												<th>Modification</th>
												<th>Suppression</th>
                                            </thead>
                                            <tbody>

						<?php
						//requête de travail
						$requete = "select idmission, nomindividu, prenomindividu, immatriculationvehicule, objectifmission, kmparcourumission, 
						qtecarburantmission, datereservation, datefinreservation
						from mission m, individu i, vehicule v
						where m.idindividu=i.idindividu and v.idvehicule=m.idvehicule";
						$resultat=mysqli_query($connect,$requete) or die(mysqli_error());
						?>

			
								<?php
								while ($row=mysqli_fetch_row($resultat))
								{
								$code=$row[0];
								$nom=$row[1].' '.$row[2];
								$matricule=$row[3];
								$objectif=$row[4];
								$km=$row[5];
								if($km==NULL)
									$km="---";
								$qte=$row[6];
								if($qte==NULL)
									$qte="---";
								$date=$row[7];
								$datefin=$row[8];
								?>
								<tr>
									<td align="center">
										<?php echo $nom?>
									</td>
									<td align="center">
										<?php echo $matricule?>
									</td>
									<td align="center">
										<?php echo $objectif?>
									</td>
									<td align="center">
										<?php echo $km?>
									</td>
									<td align="center">
										<?php echo $qte?>
									</td>
									<td align="center">
										<?php echo $date?>
									</td>
									<td align="center">
										<?php echo $datefin?>
									</td>
									<td align="center">
										<a href=modifier_reservation_form.php?code=<?php echo $code?> target="bas" title="Modifier"><i class='material-icons'>mode_edit</i></a>
									</td>
									<td align="center">
										<a href=confirmation_supprimer_reservation.php?code=<?php echo $code?> target="bas" title="Supprimer"><i class='material-icons'>delete</i></a>
									</td>
								</tr>
								<?php
								}
								?>
										</tbody>
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