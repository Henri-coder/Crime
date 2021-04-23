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
	 	echo "connection reussi";
	 	if (isset($_POST['forminscription'])) {
		    if ((!empty($_POST['name']) AND !empty($_POST['CNI']) AND !empty($_POST['ville']) AND !empty($_POST['numero']) AND !empty($_POST['password']) AND!empty($_POST['password2']))) {
		      $name = htmlspecialchars($_POST['name']);
		      
		      $cni = $_POST['CNI'];
		      $numero = $_POST['numero'];
		      $ville = htmlspecialchars($_POST['ville']);
		      $password = htmlspecialchars($_POST['password']);
		      $password2 = htmlspecialchars($_POST['password2']);

		      if ($password == $password2) {
		        $insert = $connection -> prepare("INSERT INTO victime(vi_nomPrenom, vi_CNI, vi_ville, vi_numero, vi_password) VALUES(?, ?, ?, ?, ?)");
		        $insert->execute(array($name, $cni, $ville, $numero, $password));
		        echo '<font color = "green">'."votre compte à bien été créer".'</font>';
		        echo $name;
		        echo $cni;
		        echo $numero;
		        echo $ville;
		        echo $password;
		      } else {
		        echo '<font color = "red">'."les mots de passes ne correspondent pas".'</font>';
		      }
		      
		      
		    }else {
		      echo '<font color = "red">'."Tous les champs ne sont pas rempli".'</font>';
		    }
		  }
	 } catch (Exception $e) {
	 	echo "Echec de la connection : " .$e->getMessage();
	 }
	?>
	<form method="post" action="">
		<h2>Enregistrer votre crime</h2>
		<select>
			<option>Vol de telephone</option>
			<option>Vol d'ecouteurs</option>
			<option>Vol de television</option>
			<option>vol de tablette</option>
			<option>Arnaque au transfert</option>
		</select>
		
		<select>
			<option>Vol de telephone</option>
			<option>Vol d'ecouteurs</option>
			<option>Vol de television</option>
			<option>vol de tablette</option>
			<option>Arnaque au transfert</option>
		</select>

		<select>
			<option>couleur</option>
			<option>Noir</option>
			<option>Blue</option>
			<option>Rouge</option>
			<option>Jaune</option>
		</select>
 		<input type="text" name="" placeholder="Numero de serie">
 		<input type="text" name="" placeholder="Ville du vol">
 		<input type="date" name="" placeholder="date du vol">

		
	</form>
</body>
</html>

	
