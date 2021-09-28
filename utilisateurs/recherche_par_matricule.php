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

	<title>System de Location des Voitures - Recherche Utilisateur par matricule</title>

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
					<div class="col-lg-12 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="orange">
	                                <h4 class="title">Recherche Utilisateur par matricule</h4>	                              
	                            </div>
	                            <div class="card-content table-responsive">
	                                
							<?php
							$matricule = $_POST['matricule'];
							$requete = "select nomindividu, prenomindividu, telindividu, cinindividu 
							from individu i, vehicule v
							where i.idvehicule=v.idvehicule and v.immatriculationvehicule='".$matricule."'";
							$resultat = mysqli_query($connect,$requete) or die("erreur dans la requete : " . $requete);
							?>
							<p align="center" class="style2"><strong>- Recherche de l'utilisateur qui utilise- <?php echo $matricule ?> -</strong></p>
							<table class="table table-hover">
							    <tr>
									<th width="140" align="center" class="style3" >Nom </th>
									<th width="140" align="center" class="style3" >Prénom </th>
									<th width="180" align="center" class="style3" >Tel </th>
									<th width="100" align="center" class="style3" >CIN </th>
							    </tr>
								<?php
								while( $row = mysqli_fetch_row($resultat) )
								{
								?>
								<tr>
									<td><?php echo $row[0]; ?></td>
									<td><?php echo $row[1]; ?></td>
									<td><?php echo $row[2]; ?></td>
									<td><?php echo $row[3]; ?></td>
								</tr>
								<?php } ?>
							</table>
							<input type="button" value="Retour" onClick="window.location='recherche_utilisateur_form.php'"></input>
						</div>
					</div>
							<?php
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

<?php
// deconnexion de la base
mysqli_close($connect);
?>