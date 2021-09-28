<?php 
// On test bien que l'utilisateur c'est bien connecter car il aurait pu se connecter en tapant l'url : /ceffparc/accueil.htm sans se logger
if ( empty($_SESSION["login"]) )
{

	header("location: ../index.php");

}else{
?>
	<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="" class="simple-text">
					<img src="../image/logo.png" height="120" />
				</a>
			</div>

			<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li class="active">
	                    <a href="../includes/accueil.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="../vehicule/liste_vehicule.php">
	                        <i class="material-icons">directions_car</i>
	                        <p>Véhicules</p>
	                    </a><!--
	                    <ul>
	                    		<li><a href="liste_type_veh.php">Liste des v&eacute;hicules</a></li>
								<li><a href="ajouter_vehicule_form.php">Ajouter un v&eacute;hicule</a></li>
								<li><a href="affecter_vehicule_form.php">Affecter &agrave; un utilisateur</a></li>
	                    </ul>-->
	                </li>
	                <li>
	                    <a href="../utilisateurs/liste_utilisateur.php">
	                        <i class="material-icons">person</i>
	                        <p>Utilisateurs</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="../fournisseurs/liste_fournisseur.php">
	                        <i class="material-icons">library_books</i>
	                        <p>Fournisseurs</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="../contrat/liste_contrat.php">
	                        <i class="material-icons">card_membership</i>
	                        <p>Contrats</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="../sinistre/liste_sinistre.php">
	                        <i class="material-icons">date_range</i>
	                        <p>Sinistres</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="../reservation/liste_reservation.php">
	                        <i class="material-icons">done_all</i>
	                        <p>Réservations</p>
	                    </a>
	                </li>
					<li>
	                    <a href="../interventions/liste_intervention.php">
	                        <i class="material-icons">compare_arrows</i>
	                        <p>Interventions</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="../maps/maps.php">
	                        <i class="material-icons">room</i>
	                        <p>Maps</p>
	                    </a>
	                </li>
	               
	            </ul>
	    	</div>

	    </div>
<?php
	    	}
?>