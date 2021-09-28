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

	<title>System de Location des Voitures - Liste des Véhicules</title>

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
					<a href="liste_vehicule.php" class="btn-success btn">Type des Véhicules</a>
					<a href="ajouter_vehicule_form.php" class="btn-success btn">Ajouter une Véhicule</a>
						<a href="##" onClick="imprimer()" class="btn-info btn">Imprimer cette page</a>
						<script language="Javascript">
							function imprimer(){window.print();}
						</script>
					<div class="row">
    					<div class="col-md-8 col-md-offset-2">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Liste des Véhicules</h4>   
                                    <p class="category"><?php echo "Liste des ".$_GET["libelle"]."s"."<br>";?></p>                              
                                </div>
                                <div class="card-content">
                                	<div class="table-responsive table-upgrade">
                                        <table class="table">
                                            <thead>
                                                <th>Code Véhicule</th>
                                            	<th>Detail</th>
                                            	<th>Modifier</th>
                                            	<th>Supprimer</th>
                                            </thead>
                                            <tbody>
									<?php
									//récupération de donnée
									$choix=$_GET["libelle"];
									//requête de travail
									$sql="select * from vehicule v, categorie c
											where c.IDCATEGORIE=v.IDCATEGORIE
											and c.LIBELLECATEGORIE='".$choix."' 
											order by IDVEHICULE";
									$query=mysqli_query($connect,$sql) or die(mysqli_error());
									?>

									<?php
									while ($row=mysqli_fetch_row($query))
									{
			
					echo "<tr><td>".($row[13])."</td>"; 
					echo "<td><a href=\"detail_vehicule.php?&code=".$row[0]."\"><i class='material-icons'>library_books</i></a></td>"; 
					echo "<td><a href=\"modifier_vehicule_form.php?&code=".$row[0]."\" ><i class='material-icons'>mode_edit</i></a></td>";
					echo "<td><a href=\"confirmation_supprimer_vehicule.php?&code=".$row[0]."\" ><i class='material-icons'>delete</i></a></td></tr>";
		
									}
									// deconnexion de la base
									mysqli_close($connect); 
									?>
										</tbody>
                                    </table>
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