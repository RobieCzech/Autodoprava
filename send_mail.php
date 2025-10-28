<?php
// ==== NASTAVENÍ ====
$to = "renedolezel@seznam.cz";  // kam se mají posílat zprávy
$subject = "Zpráva z kontaktního formuláře - Autodoprava Deniska";

// ==== ZÍSKÁNÍ DAT Z FORMULÁŘE ====
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// ==== KONTROLA ====
if ($name == '' || $email == '' || $phone == '' || $message == '') {
    echo "Chybí údaje, zkuste to prosím znovu.";
    exit;
}

// ==== OBSAH E-MAILU ====
$body = "Nová zpráva z webu Autodoprava Deniska:\n\n";
$body .= "Jméno: $name\n";
$body .= "E-mail: $email\n";
$body .= "Telefon: $phone\n";
$body .= "Zpráva:\n$message\n";

// ==== HLAVIČKY ====
$headers = "From: $name <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// ==== ODESLÁNÍ ====
if (mail($to, $subject, $body, $headers)) {
    echo "OK";  // můžeš nahradit přesměrováním např. header('Location: diky.html');
} else {
    echo "Chyba při odesílání e-mailu.";
}
?>
