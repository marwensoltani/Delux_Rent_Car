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

	<title>System de Location des Voitures - Modification fournisseur</title>

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
				$fournisseur=$_GET["code"];
				//requête de travail
				$requete="select idfournisseur, nomfournisseur, rsfournisseur, villefournisseur, telfournisseur from fournisseur where idfournisseur='$fournisseur'";
				$resultat=mysqli_query($connect,$requete) or die(mysqli_error());
				$row=mysqli_fetch_array($resultat);
				$code=$row[0];
				$nom=$row[1];
				$rs=$row[2];
				$ville=$row[3];
				$tel=$row[4];

			?>		
			<div class="content">
				<div class="container-fluid">
					<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Fournisseur</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Modification fournisseur</h4>
                                    <p class="categorie"><?php echo "Modification de la société ".$nom; ?></p>
                                </div>
                                <div class="card-content">

					
								<form action="modifier_fournisseur.php" method="POST">
								
								<input type="hidden" name="code" value="<?php echo $code?>">
								<table class="table">
								<tr>
									<td>
									<span class="style4">Nom : </span>
									</td>
									<td><input name="nom" type="text"  value="<?php echo $nom?>"></td>
								</tr>
								<tr><td height="8"></td></tr>
								<tr>
									<td>
									<span class="style4">Raison Social : </span>
									</td>
									<td><input name="rs" type="text"  value="<?php echo $rs?>"></td>
								</tr>
								<tr><td height="8"></td></tr>
								<tr>
									<td>
									<span class="style4">Ville : </span>
									</td>
									<td><input name="ville" type="text"  value="<?php echo $ville?>"></td>
								</tr>
								<tr><td height="8"></td></tr>
								<tr>
									<td>
									<span class="style4">Téléphone : </span>
									</td>
									<td><input name="tel" type="text"  value="<?php echo $tel?>"></td>
								</tr>
								<tr><td height="8"></td></tr>
								</table>
								<div align="right">
									<input  class="btn btn-fill btn-warning" type="button" value="Retour" onClick="window.location='liste_fournisseur.php';">
									<input  class="btn btn-fill btn-info" name="valider" type="submit" value="Modifier">
								</div>
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