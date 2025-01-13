<?php

function PokazPodstrone($id)
{
    // Obsługa strony kontaktowej
    if ($id == 3) { // ID strony kontaktowej
        ob_start(); // Rozpocznij buforowanie wyjścia
        include 'contact.php';
        PokazKontakt(); // Wywołaj formularz kontaktowy
        return ob_get_clean(); // Zwróć zawartość bufora
    }

    // Globalna zmienna bazy danych
    global $link;

    // Zabezpieczenie parametru
    $id_clear = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');

    // Zapytanie do bazy danych o treść strony
    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = mysqli_query($link, $query);

    // Sprawdzenie, czy zapytanie się powiodło
    if (!$result) {
        return '[Błąd zapytania do bazy danych]';
    }

    // Pobranie wyników zapytania
    $row = mysqli_fetch_array($result);

    // Sprawdzenie, czy strona istnieje
    if (empty($row['id'])) {
        return '[Nie znaleziono strony o podanym ID]';
    } else {
        return $row['page_content']; // Zwróć treść strony
    }
}

?>