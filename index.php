<?php session_start(); 
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>System de Location des Voitures - Login</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

	    		
<div class="content">
	<div class="container-fluid">
		<div class="row">
		<br/>
		<br/>
		<br/>
			<div class="col-lg-6 col-md-12 col-md-offset-3">
				<div class="card">
					<div class="card-header" data-background-color="orange">
                        <h4 class="title"><center>Système de Destion de Location des Véhicules</center></h4>
                    </div>
		            <div class="card-content table-responsive">
			     <?php
				include("includes/config.php");
				if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass']) ) {
					extract($_POST);
					// on recupère le password de la table qui correspond au login du visiteur
					$sql = "select TELINDIVIDU from individu where NOMINDIVIDU='".$login."'";
					$req = mysqli_query($connect,$sql) or die('error');
					$data = mysqli_fetch_assoc($req);
					if($data['TELINDIVIDU'] != $pass) 
					{
					?>
					<script language="JavaScript">
					alert("Le login ou le mot de passe que vous avez saisie est erroné. Merci de recommencer");
					// On inclut le formulaire d'identification
					</script>
						<form action="" method="post">
							<table align="center" border="0">
						    <tbody>
								<tr>
							        <td>Login :</td>
								</tr>
								<tr>
									<td><input name="login" maxlength="250" type="text"></td>
								</tr>
								<tr>
									<td >Mot de passe :</td>
								</tr>
								<tr>
									<td><input name="pass" maxlength="10" type="password"></td>
								</tr>
								<tr>
									<td style="text-align: right;"><input  class="btn btn-warning" value="Entrer" type="submit"></td>
								</tr>
							</tbody>
							</table>
						</form>
					<?php
					//Une fenêtre d'alerte s'affiche lorsque le login ou le mot de passe est invalide et renvoit vers la page pour se logger
					}
					else {
					session_start(); //on démarre une session
					$_SESSION['login'] = $login; //la variable de session $_SESSION['login'] récupère le login saisi
					header("Location: includes/accueil.php");// lien vers la page d'accueil de l'espace privé 
					}
				}
				else {
					?>

		<div class="alert alert-info">Vous avez oublié de remplir un champ. Merci de recommencer</div>

		<form action="" method="post">

				<table align="center" border="0">
			    <tbody>
					<tr>
				        <td>Nom :</td>
					</tr>
					<tr>
						<td><input name="login" maxlength="250" type="text"></td>
					</tr>
					<tr>
						<td >Mot de passe :</td>
					</tr>
					<tr>
						<td><input name="pass" maxlength="10" type="password"></td>
					</tr>
					<tr>
						<td style="text-align: right;"><input  class="btn btn-primary" value="Entrer" type="submit"></td>
					</tr>
				</tbody>
				</table>
			</form>
		<?php
			}
		?>
		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>