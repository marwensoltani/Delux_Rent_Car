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

	<title>System de Location des Voitures - Liste des utilisateurs</title>

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

					<a href="ajouter_utilisateur_form.php" class="btn btn-success">Ajouter un utilisateur</a>
					<a href="recherche_utilisateur_form.php" class="btn btn-success">Recherche un utilisateur</a>
					<a href="affecter_vehicule_form.php" class="btn btn-success">Affecter un véhicule</a>
					<a href="##" onClick="imprimer()" class="btn btn-info">Imprimer cette page</a>

						<script language="Javascript">
						function imprimer(){window.print();}
						</script>
						<?php
						//requête de travail
						$requete = "SELECT IDINDIVIDU, NOMINDIVIDU, PRENOMINDIVIDU, TELINDIVIDU, CININDIVIDU, idvehicule
									FROM INDIVIDU 
									where NOMINDIVIDU <> 'admin';";	
						$resultat = mysqli_query($connect,$requete) or die(mysqli_error());
						?>
					<div class="row">						
						<div class="col-lg-12 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="orange">
	                                <h4 class="title">Liste des utilisateurs</h4>	                              
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table table-hover">
	                                    <thead class="text-warning">
	                                    	<tr>
												<th width="100" align="center">Nom</th>
												<th width="100" align="center">Prénom</th>
												<th width="100" align="center">Téléphone</th>
												<th width="100" align="center">C.I.N</th>
												<th width="100" align="center">Véhicule</th>
												<th width="100" align="center">Modification</th>
												<th width="100" align="center">Suppression</th>
											</tr>
										</thead>
										<tbody>
						<?php
						while ($row=mysqli_fetch_row($resultat))
						{
							echo "<tr>";
							echo "<td align=\"center\">$row[1]</td>";
							echo "<td align=\"center\">$row[2]</td>";
							if( !empty($row[3]) )
								echo "<td align=\"center\">$row[3]</td>";
							else
								echo "<td align=\"center\">---</td>";
							if( !empty($row[4]) )
								echo "<td align=\"center\">$row[4]</td>";
							else
								echo "<td align=\"center\">---</td>";
							$requete1 = "select immatriculationvehicule from vehicule where idvehicule='".$row[5]."'";
							$resultat1 = mysqli_query($connect,$requete1) or die(mysqli_error());
							$row1 = mysqli_fetch_row($resultat1);
							if( !empty($row1[0]) )
								echo "<td align=\"center\">$row1[0]</td>";
							else
								echo "<td align=\"center\">---</td>";
							echo "<td align=\"center\"><a href=modifier_utilisateur_form.php?code=$row[0] target=\"bas\"><i class='material-icons'>mode_edit</i></a></td>";
							echo "<td align=\"center\"><a href=confirmation_supprimer_utilisateur.php?code=$row[0] target=\"bas\"><i class='material-icons'>delete</i></a></td>";
							echo "<tr>";
						}
						?>
							
						</tbody>
					</table>
					</div>
				</div>
			</div>
						<?php
						// deconnexion de la base
						mysqli_close($connect); 
						?>
				</div>
			</div>

			<?php include("../includes/footer.php"); ?>
		</div>
	</div>

</body>

	<?php include("../includes/script.php"); ?>

</html>