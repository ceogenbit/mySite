<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('en', 'phpmailer/language/');
	$mail->IsHTML(true);

	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'ceogenbit@gmail.com';                     //SMTP username
	$mail->Password   = 'aqwuhjjkyegsdqon';                               //SMTP password
	$mail->SMTPSecure = 'TLS';            //Enable implicit TLS encryption
	$mail->Port       = 587;                 

	//Від кого лист
	$mail->setFrom('ceogenbit@gmail.com', 'ceogenbit'); // Вказати потрібний E-mail
	//Кому відправити
	$mail->addAddress('vopntery@protonmail.com'); // Вказати потрібний E-mail
	//Тема листа
	$mail->Subject = 'Email from dimsWeb';

	//Тіло листа
	$body = '<h1>Hi! You have a new message!</h1>';

	if(trim(!empty($_POST['name']))){
		$body .= "<p><i>Name: </i><strong>".$_POST['name']."</strong></p>";
	}	
	if(trim(!empty($_POST['email']))){
		$body .= "<p><i>Email: </i><strong>".$_POST['email']."</strong></p>";
	}	
	if(trim(!empty($_POST['tel']))){
		$body .= "<p><i>Phone number: </i><strong>".$_POST['tel']."</strong></p>";
	}	
	if(trim(!empty($_POST['message']))){
		$body .= "<p><i>Message: </i><strong>".$_POST['message']."</strong></p>";
	}
	
	//Прикріпити файл
	// if (!empty($_FILES['image']['tmp_name'])) {
	// 	//шлях завантаження файлу
	// 	$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
	// 	//грузимо файл
	// 	if (copy($_FILES['image']['tmp_name'], $filePath)){
	// 		$fileAttach = $filePath;
	// 		$body.='<p><strong>Фото у додатку</strong>';
	// 		$mail->addAttachment($fileAttach);
	// 	}
	// }

	$mail->Body = $body;
	
	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'Success!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
	
?>