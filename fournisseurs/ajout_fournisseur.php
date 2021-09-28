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
					<h1>Ajouter une société</h1>
							<?php
							//récupérer les données du formulaire "ajout_fournisseur_form"
							$nom=$_POST['nom'];
							$rs=$_POST['rs'];
							$ville=$_POST['ville'];
							$tel=$_POST['tel'];
							//Gestion du libelle type de société
							echo ("<b>Nom de la société : </b>");
							echo $nom."<BR>";
							echo ("<b>Raison sociale : </b>");
							echo $rs."<BR>";
							echo ("<b>Ville : </b>");
							echo $ville."<BR>";
							echo ("<b>Téléphone : </b>");
							echo $tel."<BR>";
							// bouton de retour  
							echo "<form>";
							echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_fournisseur_form.php';\">";
							echo "</form>";
							// requéte insertion du nouvel enregistrement
							$query="insert into fournisseur (nomfournisseur, rsfournisseur, villefournisseur, telfournisseur) 
							values ('".$nom."','".$rs."','".$ville."','".$tel."')";
							// execution de la requète
							$resultat = mysqli_query($connect,$query) or die("erreur dans la requete : " . $query);
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
