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

	<title>System de Location des Voitures - Ajouter une société</title>

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
					<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Fournisseur</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Ajouter une société</h4>
                                </div>
                                <div class="card-content">
					
									<form name="ajout_fournisseur" method="post" action="ajout_fournisseur.php">
										<table class="table">
											<tr>
												<td align="right"><span class="style4">Nom du fournisseur :</span></td>
												<td><input type="text" name="nom"></td>
										    </tr>
											<tr>
												<td align="right"><span class="style4">Raison social : </span></td>
												<td><input type="text" name="rs"></td>
										    </tr>
											<tr>
												<td align="right"><span class="style4">Ville :</span></td>
												<td><input type="text" name="ville"></td>
											</tr>
											<tr>
												<td align="right"><span class="style4">Téléphone : </span></td>
												<td><input type="text" name="tel" maxlength="9"></td>
											</tr>
										</table><br><br>
									<div align="right"><input class="btn btn-fill btn-info"  type ="submit" value="Enregistrer"><br><br></div>
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