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

	<title>System de Location des Voitures - Detail Véhicule</title>

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
					<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Véhicules</a>
					<a href="##" onClick="imprimer()" class="btn-info btn">Imprimer cette page</a>
					<div class="row">
    					<div class="col-md-8 col-md-offset-2">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Detail Véhicule</h4>
                                </div>
                                <div class="card-content">
				

							<form name="detail_materiel" method="post">
							<?php
							$vehicule=$_GET["code"];
							$requete1="select IDVEHICULE, IMMATRICULATIONVEHICULE, LIBELLETYPECARBURANT, PUISSANCEVEHICULE, CARTEGRISEVEHICULE, NBRPORTEVEHICULE, LIBELLEMODELE, LIBELLETYPEVEHICULE, PATHPHOTOVEHICULE
							from vehicule v , typeCarburant t, modele m, typevehicule tv
							where t.IDTYPECARBURANT=v.IDTYPECARBURANT
							and m.IDMODELE=v.IDMODELE
							and tv.IDTYPEVEHICULE=v.IDTYPEVEHICULE
							and v.IDVEHICULE='".$vehicule."'";
							$resultat1=mysqli_query($connect,$requete1) or die(mysqli_error());
							while ($row1=mysqli_fetch_array($resultat1))
							{
								$idvehicule=$row1[0];
								$matricule=$row1[1];
								$libellecarburant=$row1[2];
								$puissance=$row1[3];
								$cartegrise=$row1[4];
								$nbrporte=$row1[5];
								$modele=$row1[6];
								$statut=$row1[7];
								$photo=$row1[8];
							}

							echo "<h4>Caractéristique du materiel ".$matricule." </h4>";

							?>
							<input type="hidden" name="code" value="<?php echo $vehicule?>">
							<table class="table">
								<tr>
									<td align="left">Carburant :</td>
									<td><input type="text" name="libellecarburant" value="<?php echo $libellecarburant?>" readonly="1"></td>
									<td align="left">Puissance : </td>
									<td><input type="text" name="puissance" value="<?php echo $puissance?>" readonly="1"></td>
								</tr>
								<tr>
									<td align="left">Carte grise :</td>
									<td><input type="text" name="cartegrise" value="<?php echo $cartegrise?>" readonly="1"></td>
									<td align="left">Nombre de porte :</td>
									<td><input type="text" name="nbrporte" maxlength="10" value="<?php echo $nbrporte?>" readonly="1"></td>
								</tr>
								<tr>
									<td align="left">Modele : </td>
									<td><input type="text" name="modele" value="<?php echo $modele?>" readonly="1"></td>
									<td align="left">Statut :</td>
									<td><input type="text" name="nom" value="<?php echo $statut?>" readonly="1"></td>
								</tr>
								<?php
								if( !empty($photo) )
								echo 
								"<tr>
									<td colspan=\"4\" align=\"center\">Photo Véhicule : </td>
								</tr>
								<tr>
									<td colspan=\"4\" align=\"center\">
										<img src=$photo>
									</td>
								</tr>" ;
								?>
							</table><br>
							</form>
							<?php
							$requete2="select DATEAQUISITIONVEHICULE, LIBELLETYPECONTRAT, MONTANTCONTRAT from vehicule v, typecontrat tc, contrat c
							where v.IDVEHICULE=C.IDVEHICULE
							and tc.IDTYPECONTRAT=c.IDTYPECONTRAT
							and v.IDVEHICULE='".$vehicule."'";
							$resultat2=mysqli_query($connect,$requete2) or die(mysqli_error());
							while ($row2=mysqli_fetch_array($resultat2))
							{
								$dateacquisition=$row2[0];
								$modeacquisition=$row2[1];
								$montantacquisition=$row2[2];
							}
							?>

							<h4>Informations sur le Mode d'acquisition du <?php echo $matricule?></h4>
							<input type="hidden" name="code" value="<?=$vehicule ?>">
							<table class="table">
								<tr>
									<td align="left">Date d'acquisition :</td>
									<td><input type="text" name="dateacquisition" value="<?php echo @$dateacquisition?>" readonly="1"></td>
								</tr>
								<tr>
									<td align="left">Mode d'acquisition: </td>
									<td><input type="text" name="modeacquisition" value="<?php echo @$modeacquisition?>" readonly="1"></td>
								</tr>
								<tr>
									<td align="left">Montant d'acquisition: </td>
									<td><input type="text" name="modeacquisition" value="<?php echo @$montantacquisition?>" readonly="1"></td>
								</tr>
							</table><br>
							<h4>Utilisateur du materiel <?php echo $matricule?></h4>
							<?php
							//requête de travail utilisateur de véhicule
							$requete3="select NOMINDIVIDU, PRENOMINDIVIDU, TELINDIVIDU
							 	from individu i, vehicule v
								where i.IDVEHICULE=v.IDVEHICULE
								and v.IDVEHICULE='".$vehicule."'";
							$resultat3=mysqli_query($connect,$requete3) or die(mysqli_error());
							?>
							<table class="table">
								<tr>
									<th width="180" align="center" class="style3">Nom utilisateur</th>
									<th width="150" align="center" class="style3">Prém utilisateur</th>
									<th width="150" align="center" class="style3">Tel utilisateur</th>
								</tr>
								<?php
								while ( $row3=mysqli_fetch_row($resultat3) )
									echo "<tr><td align=\"center\">$row3[0]</td><td align=\"center\">$row3[1]</td><td align=\"center\">$row3[2]</td></tr>";
								?>
							</table>
							<?php mysqli_close($connect); ?>
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

