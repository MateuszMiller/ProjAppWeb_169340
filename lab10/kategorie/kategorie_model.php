<?php
// Połączenie z bazą danych
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cms";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą: " . $e->getMessage());
}

// Dodaj kategorię
if (isset($_POST['dodaj'])) {
    $nazwa = $_POST['nazwa'];
    $matka = $_POST['matka'] ?? 0;
    
    $sql = "INSERT INTO kategorie (nazwa, matka) VALUES (:nazwa, :matka)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nazwa' => $nazwa, 'matka' => $matka]);
    echo "<p>Kategoria '$nazwa' została dodana.</p>";
}

// Usuń kategorię
if (isset($_POST['usun'])) {
    $id_usun = $_POST['id_usun'];
    
    $sql = "DELETE FROM kategorie WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id_usun]);
    echo "<p>Kategoria o ID $id_usun została usunięta.</p>";
}

// Edytuj kategorię
if (isset($_POST['edytuj'])) {
    $id_edytuj = $_POST['id_edytuj'];
    $nowa_nazwa = $_POST['nowa_nazwa'];
    
    $sql = "UPDATE kategorie SET nazwa = :nazwa WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nazwa' => $nowa_nazwa, 'id' => $id_edytuj]);
    echo "<p>Kategoria o ID $id_edytuj została zaktualizowana na '$nowa_nazwa'.</p>";
}

// Funkcja wyświetlająca drzewo kategorii
function pokazKategorie($pdo, $matka = 0, $poziom = 0) {
    $sql = "SELECT id, nazwa FROM kategorie WHERE matka = :matka";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['matka' => $matka]);
    $kategorie = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($kategorie as $kategoria) {
        echo str_repeat("&nbsp;&nbsp;&nbsp;", $poziom) . "→ " . htmlspecialchars($kategoria['nazwa']) . " (ID: " . $kategoria['id'] . ")<br>";
        // Rekurencyjne wywołanie dla podkategorii
        pokazKategorie($pdo, $kategoria['id'], $poziom + 1);
    }
}

echo "<h3>Drzewo kategorii</h3>";
pokazKategorie($pdo);
?>