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

	<title>System de Location des Voitures - Liste des Contrats</title>

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
    	<script language="Javascript">
				function imprimer(){window.print();}
		</script>
</head>

<body>

	<div class="wrapper">

	    
		<?php include("../includes/sidebar.php"); ?>


	    <div class="main-panel">
	    		
	    	<?php include("../includes/navbar.php"); ?>
				
			<div class="content">
				<div class="container-fluid">

					<a href="ajouter_contrat_form.php" class="btn btn-success">Ajouter un contrat</a> 
					<a href="##" onClick="imprimer()"  class="btn btn-info" >Imprimer cette page</a>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="orange">
	                                <h4 class="title">Liste des Contrats</h4>	                              
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table table-hover">
	                                    <thead class="text-warning">
						<?php
						//requête de travail
						$requete = "select idcontrat, nomfournisseur, rsfournisseur, libelletypecontrat, immatriculationvehicule, datedebcontrat, datefincontrat, montantcontrat
						from contrat c, typecontrat t, vehicule v, fournisseur f
						where c.idtypecontrat=t.idtypecontrat and f.idfournisseur=c.idfournisseur and v.idvehicule=c.idvehicule";
						$resultat=mysqli_query($connect,$requete) or die(mysqli_error());
						?>
						    <tr>
								<th>Nom Fournisseur </th>
								<th>Raison Social</th>
								<th>Type Contrat</th>
								<th>Matricule vehicule</th>
								<th>Debut Contrat</th>
								<th>Fin Contrat</th>
								<th>Montant Contrat</th>
								<th>Modification</th>
								<th>Suppression</th>
							</tr>
						</thead>
							<tbody>
							<?php
									while ($row=mysqli_fetch_row($resultat))
									{
									$code=$row[0];
									$nom=$row[1];
									$rs=$row[2];
									$libelletc=$row[3];
									$matricule=$row[4];
									$debutcontrat=$row[5];
									if($debutcontrat==NULL)
										$debutcontrat="---";
									$fincontrat=$row[6];
									if($fincontrat==NULL)
										$fincontrat="---";
									$montantcontrat=$row[7];
									?>
									<tr>
										<td align="center">
											<?php echo $nom?>
										</td>
										<td align="center">
											<?php echo $rs?>
										</td>
										<td align="center">
											<?php echo $libelletc?>
										</td>
										<td align="center">
											<?php echo $matricule?>
										</td>
										<td align="center">
											<?php echo $debutcontrat?>
										</td>
										<td align="center">
											<?php echo $fincontrat?>
										</td>
										<td align="center">
											<?php echo $montantcontrat?>
										</td>
										<td align="center">
											<a href=modifier_contrat_form.php?code=<?php echo $code?> target="bas" title="Modifier"><i class='material-icons'>mode_edit</i></a>
										</td>
										<td align="center">
											<a href=confirmation_supprimer_contrat.php?code=<?php echo $code?> target="bas" title="Supprimer"><i class='material-icons'>delete</i></a>
										</td>
									</tr>
									<?php
									}
									// deconnexion de la base
									mysqli_close($connect); 

									?>
									</tbody>
								</table>
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