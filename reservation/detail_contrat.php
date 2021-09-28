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

	<title>System de Location des Voitures - Détail Contrat</title>

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
					<h1>Détail Contrat</h1>


							<form action="modifier_fournisseur.php" method="POST">
							<?php
							$societe=$_GET["code"];

							//requête de travail
							$requete="select * from societe where id_societe='$societe'";
							$resultat=mysqli_query($connect,$requete) or die(mysqli_error());
							while ($row=mysqli_fetch_array($resultat))
							{
							$code=$row[0];
							$nom=$row[1];
							$adresse=$row[2];
							$ville=$row[3];
							$cp=$row[4];
							$site=$row[5];
							$tel=$row[6];
							$port=$row[7];
							$fax=$row[8];
							$mail=$row[9];
							$observation=$row[10];
							$type_societe=$row[11];
							}

							// requéte affichage du nom et du libelle_type de la société
							  $requete1="SELECT libelle_type_societe
							            from type_societe t 
								  where id_type_societe=".$type_societe ;
							  // execution de la requète et test
							  $resultat1 = mysqli_query($connect,$requete1);
							  $row1=mysqli_fetch_array($resultat1);

							$libelle_type_societe=$row1[0];


							echo "<center><span class=style2>Détail sur la société ".$nom."</span><br>";
							echo "<br><br>";
							?>
							<input type="hidden" name="code" value="<?=$code?>">
							Nom : <input name="nom" type="text"  value="<?=$nom?>" readonly="1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							Type de société : <input name="type_societe" type="text"  value="<?=$libelle_type_societe?>" readonly="1"><br><br>
							Adresse : <textarea name="adresse" readonly="1"><?=$adresse?></textarea><br><br>
							Ville : <input name="ville" type="text"  value="<?=$ville?>" readonly="1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							Code postal : <input name="cp" type="text"  value="<?=$cp?>" readonly="1"><br><br>
							Site Web : <input name="site" type="text" value="<?=$site?>" readonly="1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							Téléphone : <input name="tel" type="text"  value="<?=$tel?>" readonly="1"><br><br>
							Téléphone Portable : <input name="port" type="text"  value="<?=$port?>" readonly="1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							Fax : <input name="fax" type="text"  value="<?=$fax?>" readonly="1"><br><br>
							E-Mail : <input name="mail" type="text"  value="<?=$mail?>" readonly="1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							Observation : <textarea name="observation" readonly="1"><?=$observation?></textarea><br><br>




							<input type="button" value="Retour" onClick="window.location='liste_fournisseur.php';">
					</form>


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
