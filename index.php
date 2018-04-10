<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$destinataire = 'stacy.d@codeur.online';

	$errors = [
		'nom' => '',
		'prenom' => '',
		'message' => '',
		'mail' => ''
	];		

	if(!empty($_POST)) {
		/*Recuperation*/
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$message = $_POST['message'];
		$mail = $_POST['mail'];
		$isValid = true;


		/*Message d'erreurs*/
		if ( empty( $_POST['nom'] ) ){
			$errors['nom'] = 'Bah alors,  on est timide?';
			$isValid = false;
		}

		if ( empty( $_POST['prenom'] ) ){
			$errors['prenom'] = 'Bah alors,  on est timide?';
			$isValid = false;
		}

		if ( empty( $_POST['message'] ) ){
			$errors['message'] = 'Pas de message?';
			$isValid = false;
		}

		if ( empty($_POST['mail'])){
			$errors['mail'] = 'Et ton mail alors ?';
			$isValid= false;
		}

		if($isValid == true) {

			//construit ton email

		//$headers .= 'Reply-To: '.$email. "\r\n" ;
		//$headers .= 'X-Mailer:PHP/'.phpversion();
 

 
		// Remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('&lt;br&gt;','',$message);
		$message = str_replace('&lt;br /&gt;','',$message);
		$message = str_replace("&lt;","&lt;",$message);
		$message = str_replace("&gt;","&gt;",$message);
		$message = str_replace("&amp;","&",$message);
 
		// Envoi du mail
		$to = 'stacy.d@codeur.online';
		$headers = 'From: "Destinataire"<stacy.d@codeur.online>'."\n";
		$headers .= 'Content-Type: text/html; charset="UTF-8"'."\n";

		$msg = "nom: ".$nom;
		$msg .= "prenom:" .$prenom;
		$msg .= "message:" .$message;
		$msg .= "mail:" .$mail;

		if(mail('stacy.d@codeur.online', $headers, $msg))
		{
			echo '<p>'.$message_envoye.'</p>';
		}
	
	}
}
	?>
	<form method="post" action="index.php" >
		
		<p>Nom</p>
		<input type="text" name="nom" value="<?php echo (isset($_POST['nom'])) ? $_POST['nom'] : '' ?>">
		<?php if(isset($errors['nom'])) echo $errors['nom'];?>

		<p>Prénom</p>
		<input type="text" name="prenom" value="<?php echo (isset($_POST['prenom'])) ? $_POST['prenom'] : '' ?>">
		<?php if(isset($errors['prenom'])) echo $errors['prenom'];?>

		<p>Message</p>
		<textarea name="message"> <?php echo (isset($_POST['message'])) ? $_POST['message'] : '' ?></textarea>
		<?php if(isset($errors['message'])) echo $errors['message'];?>

		<p>Mail</p>
		<input type="mail" name="mail">
		<?php if(isset($errors['mail'])) echo $errors ['mail'] ?>

		<input type="submit" />
	</form>


</body>
</html>