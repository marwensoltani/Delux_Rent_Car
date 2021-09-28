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

	<title>System de Location des Voitures - Modification utilisateur</title>

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
			<?php
				$utilisateur=$_GET["code"];
				//requête de travail
				$requete="select nomindividu, prenomindividu, telindividu, cinindividu, pathphotoindividu
							from individu where IDINDIVIDU='$utilisateur'";
				$resultat=mysqli_query($connect,$requete) or die(mysqli_error());
				$row=mysqli_fetch_array($resultat);
				//Titre de la page

			?>	
			<div class="content">
				<div class="container-fluid">
					<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Fournisseur</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Modification utilisateur</h4>
                                    <p class="categorie"><?php echo "Modification de l'utilisateur ".$row[0].' '.$row[1]; ?></p>
                                </div>
                                <div class="card-content">
									<form action="modifier_utilisateur.php" method="POST">
			
									<input type="hidden" name="code" value="<?php echo $utilisateur?>">
									Nom : <input name="nom" type="text"  value="<?php echo $row[0]?>">&nbsp;&nbsp;
									Prénom : <input name="prenom" type="text"  value="<?php echo $row[1]?>"><br><br>
									Téléphone : <input name="tel" type="text"  value="<?php echo $row[2]?>" maxlength="10">&nbsp;&nbsp;
									C.I.N : <input name="cin" type="text"  value="<?php echo $row[3]?>"><br><br>
									Photo : <input name="photo" type="text"  value="<?php echo $row[4]?>"><br><br>
									<input type="button" class="btn btn-primary" value="Retour" onClick="window.location='liste_utilisateur.php';">
									<input name="valider" class="btn btn-info" type="submit" value="Modifier">
									</form>
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