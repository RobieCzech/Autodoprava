<<<<<<< HEAD
<?php
// ==== KONFIGURACE ====
$to = "renedolezel@seznam.cz"; // <-- sem napiš svůj e-mail, kam mají zprávy chodit
$subject = "Nová zpráva z webu Autodoprava Deniska";

// ==== ZÍSKÁNÍ DAT Z FORMULÁŘE ====
$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// ==== KONTROLA ====
if (!$name || !$phone || !$message) {
  exit("Prosím, vyplňte všechna povinná pole.");
}

// ==== PŘÍPRAVA OBSAHU E-MAILU ====
$body = "Nová zpráva z webu:\n\n";
$body .= "Jméno a příjmení: $name\n";
$body .= "Telefon: $phone\n";
$body .= "Email: $email\n\n";
$body .= "Zpráva:\n$message\n";

// ==== HLAVIČKY ====
$headers = "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
if ($email) $headers .= "Reply-To: $email\r\n";

// ==== ODESLÁNÍ ====
if (mail($to, $subject, $body, $headers)) {
  echo "OK";
} else {
  echo "CHYBA: Nepodařilo se odeslat e-mail.";
}
?>
