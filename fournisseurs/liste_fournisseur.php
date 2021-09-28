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

	<title>System de Location des Voitures - Liste des fournisseurs</title>

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
						<a href="ajouter_fournisseur_form.php" class="btn-success btn">Ajouter un fournisseur</a>
						<a href="##" onClick="imprimer()" class="btn-info btn">Imprimer cette page</a>
						<script language="Javascript">
						function imprimer(){window.print();}
						</script>

					
						<?php
						//requête de travail
						$requete="select * from fournisseur";
						$resultat=mysqli_query($connect,$requete) or die(mysqli_error());
						?>
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="orange">
	                                <h4 class="title">Liste des fournisseurs</h4>	                              
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table table-hover">
	                                    <thead class="text-warning">
										    <tr>
												<th>Nom </th>
												<th>Raison Social</th>
												<th>Ville</th>
												<th>Téléphone</th>
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
								$ville=$row[3];
								$tel=$row[4];
								?>
								<tr>
									<td>
										<?php echo $nom?>
									</td>
									<td>
										<?php echo $rs?>
									</td>
									<td>
										<?php echo $ville?>
									</td>
									<td>
										<?php echo $tel?>
									</td>
									<td>
										<a href=modifier_fournisseur_form.php?code=<?php echo $code?> target="bas" title="Modifier"><i class='material-icons'>mode_edit</i></a>
									</td>
									<td>
										<a href=confirmation_supprimer_fournisseur.php?code=<?php echo $code?> target="bas" title="Supprimer"><i class='material-icons'>delete</i></a>
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