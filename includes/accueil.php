<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>System de Location des Voitures</title>

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

	    
		<?php include("sidebar.php"); ?>


	    <div class="main-panel">
	    		
	    	<?php include("navbar.php"); ?>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class=" col-sm-10">
							
						<a href="../vehicule/liste_vehicule.php"><button style="width:80px;height: 80px;color: red;">liste vehicule</button></a>
						
						
							<a href="../utilisateurs/liste_utilisateur.php"><button style="width:80px;height: 80px;color: red;">liste utulisateur</button></a>
							<a href="../fournisseurs/liste_fournisseur.php"><button style="width:80px;height: 80px;color: red;">liste vehicule</button></a>
					<a href="../fournisseurs/liste_fournisseur.php"><button style="width:80px;height: 80px;color: red;">liste fournisseur</button></a> 
					
					<a href="../contrat/liste_contrat.php"><button style="width:80px;height: 80px;color: red;">liste contrat</button></a>
					<a href="../sinistre/liste_sinistre.php"><button style="width:80px;height: 80px;color: red;">liste sinistre</button></a>
					<a href="../reservation/liste_reservation.php"><button style="width:80px;height: 80px;color: red;">liste reservation</button></a>
					<a href="../interventions/liste_intervention.php"><button style="width:80px;height: 80px;color: red;">liste intervention</button></a>

						<div class="col-lg-6 col-md-12">
							
			</div>

			<?php include("footer.php"); ?>
		</div>
	</div>

</body>

	<?php include("script.php"); ?>
	<script type="text/javascript">
    	$(document).ready(function(){

			// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();

    	});
	</script>
</html>
									