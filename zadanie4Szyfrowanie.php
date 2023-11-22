<?php
$login = 'admin';
$haslo = 'test';

$host = 'localhost';
$dbname = 'twoja_baza';
$user = 'twoj_uzytkownik';
$password = 'twoje_haslo';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

try {
    $stmt = $pdo->prepare("SELECT haslo FROM uzytkownicy WHERE login = ?");
    $stmt->bindParam(1, $login);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($haslo, $result['haslo'])) {
        echo "Logowanie udane!";
    } else {
        echo "Błąd logowania. Spróbuj ponownie.";
    }
} catch (PDOException $e) {
    die("Błąd odczytu z bazy danych: " . $e->getMessage());
}
?>