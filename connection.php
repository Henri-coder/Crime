<!DOCTYPE html>
<html>
<head>
	<title>compte_victime</title>
	<meta charset="utf-8">

	<!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
	<?php
	
	 try {
	 	$connection = new PDO('mysql:host = 127.0.0.1;dbname=bdcrime', 'root' , '');
	 	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	 	// variable de recuperation de l'identifiant
	 	$r = "rien";
	 	// php d'inscrption a la base de données
	 	if (isset($_POST['forminscription'])) {
		    if ((!empty($_POST['name']) AND !empty($_POST['CNI']) AND !empty($_POST['ville']) AND !empty($_POST['numero']) AND !empty($_POST['password']) AND!empty($_POST['password2']))) {
		      $name = htmlspecialchars($_POST['name']);
		      $cni = $_POST['CNI'];
		      $numero = $_POST['numero'];
		      $ville = htmlspecialchars($_POST['ville']);
		      $name = htmlspecialchars($_POST['name']);
			  $password = htmlspecialchars($_POST['password']);
		      $password2 = htmlspecialchars($_POST['password2']);

		      if ($password == $password2) {
		        $insert = $connection -> prepare("INSERT INTO victime(vi_nomPrenom, vi_CNI, vi_ville, vi_numero, vi_password) VALUES(?, ?, ?, ?, ?)");
		        $insert->execute(array($name, $cni, $ville, $numero, $password));
		        echo '<font color = "green">'."votre compte à bien été créer".'</font>';

		      $recPassword = $password;
		      echo $password;
		      
		      } else {
		        echo '<font color = "red">'."les mots de passes ne correspondent pas".'</font>';
		      }

		    	}else {
		      	echo '<font color = "red">'."Tous les champs ne sont pas rempli".'</font>';
		   		 }

		}

		// partie de la connection 
		if (isset($_POST['formconnection'])) {
		 	if (!empty($_POST['namecon']) AND !empty($_POST['passwordcon'])){
		 		
		 		$namecon = htmlspecialchars($_POST['namecon']);
				$passwordcon = htmlspecialchars($_POST['passwordcon']);	
				$GLOBALS['r'] = $passwordcon;
				$connect= $connection->prepare("SELECT * FROM victime WHERE vi_nomPrenom = ? AND vi_password = ?");
				$connect->execute(array($namecon,$passwordcon));
				$userexist = $connect->rowCount();

				if($userexist == 1){
					if ($namecon == "admin" and $passwordcon == "admin") {
						header('location:compte_admin.php');
					}
					echo "Bienvenue monsieur ".$namecon;

					
					
				}else{
					echo  '<font color = "red">'."Erreur veiller verifier votre nom ou votre mot de passe".'</font>';
				}

				
			}

				
	 	}

	 	/*echo $GLOBALS['r'].' valeur de global <br>';*/
	 	echo $r.' valeur de r <br>';

	 	// enregistrements de vols
	 	if (isset($_POST['formVol'])) {
	 		if (!empty($_POST['numVol']) AND !empty($_POST['villeVol'])){
	 				$numVol = $_POST['numVol'];
	 				$villeVol = $_POST['villeVol'];
	 				/*$datevol = $_POST['datevol'];*/
	 				$groupe1 = $_POST['groupe1'];
	 				$marque = $_POST['marque'];
	 				$couleur = $_POST['couleur'];
	 				/*$reqgroup2 = "vide";
	 				$reqgroup3 = "vide";*/
	 				
	 				
	 				echo $groupe1.'<br>';
	 				echo $villeVol.'<br>';
	 				echo $numVol.'<br>';
	 				echo $couleur.'<br>';
	 				echo $marque.'<br>';
	 				echo $r.'<br>';

	 				if ($groupe1 == "telephone") {
	 					$registreVol = $connection->prepare("INSERT INTO 
	 						telephone(marque ,couleur,numSerie,ville ,passVictime) VALUES(?,?,?,?,?)");


	 					/*INSERT INTO `telephone` (`id`, `marque`, `couleur`, `numSerie`, `ville`, `passVictime`, `date`) 
	 					VALUES (NULL, 'SAMSUNG', 'Noire', '112233457', 'Beroua', 'password', CURRENT_TIMESTAMP)*/
						$registreVol->execute(array($marque,$couleur,$numVol,$villeVol,$GLOBALS['r']));
						echo "enregistrement reussi";
	 				}

	 				if ($groupe1 == "tablette") {
	 					$registreVol = $connection->prepare("INSERT INTO 
	 						tablette(marque ,couleur,numSerie,ville ,passVictime) VALUES(?,?,?,?,?)");


	 					/*INSERT INTO `telephone` (`id`, `marque`, `couleur`, `numSerie`, `ville`, `passVictime`, `date`) 
	 					VALUES (NULL, 'SAMSUNG', 'Noire', '112233457', 'Beroua', 'password', CURRENT_TIMESTAMP)*/
						$registreVol->execute(array($marque,$couleur,$numVol,$villeVol,$r));
						echo "enregistrement reussi";
	 				}

	 				if ($groupe1 == "ecouteur") {
	 					$registreVol = $connection->prepare("INSERT INTO 
	 						ecouteur(marque ,couleur,numSerie,ville ,passVictime) VALUES(?,?,?,?,?)");


	 					/*INSERT INTO `telephone` (`id`, `marque`, `couleur`, `numSerie`, `ville`, `passVictime`, `date`) 
	 					VALUES (NULL, 'SAMSUNG', 'Noire', '112233457', 'Beroua', 'password', CURRENT_TIMESTAMP)*/
						$registreVol->execute(array($marque,$couleur,$numVol,$villeVol,$r));
						echo "enregistrement reussi";
	 				}

	 				if ($groupe1 == "television") {
	 					$registreVol = $connection->prepare("INSERT INTO 
	 						television(marque ,couleur,numSerie,ville ,passVictime) VALUES(?,?,?,?,?)");


	 					/*INSERT INTO `telephone` (`id`, `marque`, `couleur`, `numSerie`, `ville`, `passVictime`, `date`) 
	 					VALUES (NULL, 'SAMSUNG', 'Noire', '112233457', 'Beroua', 'password', CURRENT_TIMESTAMP)*/
						$registreVol->execute(array($marque,$couleur,$numVol,$villeVol,$r));
						echo "enregistrement reussi";
	 				}

	 				

	 		}else{
	 			echo "Veiller remplir tous les champs";
	 		}

		}

	 	// enregistrements des transfert
	 	if (isset($_POST['formTransfert'])) {
	 		if (!empty($_POST['montant']) AND !empty($_POST['numTr']) AND !empty($_POST['numIncon'])){

	 		}else {
	 			echo "les champs ne sont pas remplis correctements";
	 		}
	 	}
	}
	 catch (Exception $e) {
	 	echo "Echec de la connection : " .$e->getMessage();
	 }

	 // partie de la connection
	 
	 
	?>
	<form method="post" action="">
		<h2>Enregistrer votre crime</h2>
		
		<select name="groupe1">
			<option value="telephone">Vol de telephone</option>
			<option value="ecouteur">Vol d'ecouteurs</option>
			<option value="television">Vol de television</option>
			<option value="tablette">vol de tablette</option>
			
		</select>
		
		<select name="marque">
			<option value="SAMSUNG">SAMSUNG</option>
			<option value="APPLE">APPLE</option>
			<option value="LG">LG</option>
			<option value="BEATS">BEATS</option>
			
		</select>

		<select name="couleur">
			<option value="Noire">Noire</option>
			<option value="Bleu">Bleu</option>
			<option value="Rouge">Rouge</option>
			<option value="Beige">Beige</option>
		</select>
 		<input type="text" name="numVol" placeholder="Numero de serie" required>
 		<input type="text" name="villeVol" placeholder="Ville du vol" required>
 		<!-- <input type="date" name="dateVol" placeholder="date du vol"> -->
 		<input type="submit" name="formVol">
 	</div>
 	
		
	</form>

	<form method="post" action="">
		<h2>transfert d'argent a un inconnu</h2>
		<input type="text" name="montant" placeholder="Entrer le montant" required>
		<input type="text" name="numTr" placeholder="Votre numero" required>
		<input type="text" name="numIncon" placeholder="Numero de l'inconnu" required>
		<!-- <input type="date" name="datevol" placeholder="date du vol"> -->
		<input type="submit" name="formTransfert">

	</form>
</body>
</html>

	
