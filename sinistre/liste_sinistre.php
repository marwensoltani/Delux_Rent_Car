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

	<title>System de Location des Voitures - Liste des Sinistres</title>

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
						<a href="ajouter_sinistre_form.php" class="btn-success btn">Ajouter une Sinistres</a>
						<a href="##" onClick="imprimer()" class="btn-info btn">Imprimer cette page</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="orange">
                                    <h4 class="title">Liste des Sinistres</h4>   
                                </div>
                                <div class="card-content">
                                	<div class="table-responsive table-upgrade">
                                        <table class="table">
                                            <thead>
				                                <th>Nom Responsable</th>
												<th>Matricule véhicule</th>
												<th>Lieu</th>
												<th>Date</th>
												<th>Dégât matériel</th>
												<th>Dégât corporel</th>
												<th>Nombre de décès</th>
												<th>Modification</th>
												<th>Suppression</th>

											<?php
											//requête de travail
											$requete = "select idsinistre, nomindividu, prenomindividu, immatriculationvehicule, lieusinistre, datesinistre, degatmatsinistre, degatcorsinistre, nbrdecessinistre
											from sinistre s, individu i, vehicule v
											where s.idvehicule=v.idvehicule and i.idindividu=s.idindividu";
											$resultat=mysqli_query($connect,$requete) or die(mysqli_error());
											?>

										
													<?php
													while ($row=mysqli_fetch_row($resultat))
													{
													$code=$row[0];
													$nom=$row[1].' '.$row[2];
													$matricule=$row[3];
													$lieu=$row[4];
													$date=$row[5];
													$degatmat=$row[6];
													if($degatmat==NULL)
														$degatmat="---";
													$degatcor=$row[7];
													if($degatcor==NULL)
														$degatcor="---";
													$nbrdeces=$row[8];
													if($nbrdeces==NULL)
														$nbrdeces="---";
													?>
													<tr>
														<td align="center">
															<?php echo $nom?>
														</td>
														<td align="center">
															<?php echo $matricule?>
														</td>
														<td align="center">
															<?php echo $lieu?>
														</td>
														<td align="center">
															<?php echo $date?>
														</td>
														<td align="center">
															<?php echo $degatmat?>
														</td>
														<td align="center">
															<?php echo $degatcor?>
														</td>
														<td align="center">
															<?php echo $nbrdeces?>
														</td>
														<td align="center">
															<a href=modifier_sinistre_form.php?code=<?php echo $code?> target="bas" title="Modifier"><i class='material-icons'>mode_edit</i></a>
														</td>
														<td align="center">
															<a href=confirmation_supprimer_sinistre.php?code=<?php echo $code?> target="bas" title="Supprimer"><i class='material-icons'>delete</i></a>
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