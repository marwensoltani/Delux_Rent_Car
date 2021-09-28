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

	<title>System de Location des Voitures - Ajouter un utilisateur</title>

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
	                                <h4 class="title">Ajouter un utilisateur</h4>	 
	                                <p class="category">>Récapitulatif sur l'utilisateur :  </p>                             
	                            </div>
							<?php
							//récupérer les données du formulaire "ajout_utilisateur_form"
							$nom=$_POST['nom'];
							$prenom=$_POST['prenom'];
							$tel=$_POST['tel'];
							$cin=$_POST['cin'];
							$interne=$_POST['interne'];
							echo "<BR>";
							echo "<b>Nom de l'utilisateur : </b>";
							echo $nom."<BR>";
							echo "<b>Prénom de l'utilisateur : </b>";
							echo $prenom."<BR>";
							echo "<b>Téléphone : </b>";
							echo $tel."<BR>";
							echo "<b>Téléphone portable: </b>";
							echo $cin."<BR>";
							// bouton de retour  
							echo "<form>";
							echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_utilisateur_form.php';\">";
							echo "</form>";
							// requéte insertion du nouvel enregistrement dans la table utilisateur
							$requete = "INSERT INTO `individu` (`NOMINDIVIDU`, `PRENOMINDIVIDU`, `TELINDIVIDU`, `CININDIVIDU`, `INTERNE`) VALUES 
							('".$nom."', '".$prenom."', '".$tel."', '".$cin."', ".$interne.")";
							// execution de la requete
							$resultat = mysqli_query($connect,$requete) or die("erreur dans la requete : " .$requete);
							mysqli_close($connect); 
							?>

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
