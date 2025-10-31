<?php
// ===============================
// KONFIGURACE
// ===============================
$to = "renedolezel@seznam.cz"; // E-mail, kam se mají posílat zprávy
$subject = "Zpráva z kontaktního formuláře - Autodoprava Deniska";

// ===============================
// NAČTENÍ DAT Z FORMULÁŘE
// ===============================
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// ===============================
// KONTROLA VSTUPŮ
// ===============================
if ($name == '' || $email == '' || $phone == '' || $message == '') {
    echo "<h3 style='text-align:center; color:red;'>Chybí údaje, zkuste to prosím znovu.</h3>";
    exit;
}

// ===============================
// OBSAH E-MAILU
// ===============================
$body  = "Nová zpráva z webu Autodoprava Deniska:\n\n";
$body .= "----------------------------------------\n";
$body .= "Jméno: $name\n";
$body .= "E-mail: $email\n";
$body .= "Telefon: $phone\n\n";
$body .= "Zpráva:\n$message\n";
$body .= "----------------------------------------\n";

// ===============================
// HLAVIČKY E-MAILU
// ===============================
$headers  = "From: Autodoprava Deniska <web@doren.cz>\r\n"; // doporučuji vlastní doménu kvůli SPAM filtrům
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// ===============================
// ODESLÁNÍ
// ===============================
if (mail($to, $subject, $body, $headers)) {
    echo "<h3 style='text-align:center; color:green;'>Děkujeme, zpráva byla úspěšně odeslána.</h3>";
} else {
    echo "<h3 style='text-align:center; color:red;'>Nastala chyba při odesílání. Zkuste to prosím znovu.</h3>";
}
?>
