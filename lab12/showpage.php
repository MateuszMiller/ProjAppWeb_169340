<?php
//Funkcja pokazująca podstrony z bazy danych
function PokazPodstrone($id)
{
    global $link;

    if ($id == 3) { // ID strony kontaktowej
        ob_start();
        include 'contact.php';
        PokazKontakt();
        return ob_get_clean();
    }

    if ($id === 8) { // ID strony produktów
        ob_start();
        include 'products.php';
        pokazProdukty();
        return ob_get_clean();
    }

    if ($id == 9) { // Strona koszyka
        ob_start();
        require_once 'koszyk.php';
        showCart();
        return ob_get_clean();
    }

    // Obsługa wyświetlania konkretnego filmu
    if (strpos($id, 'film_') === 0) {
        $film_id = substr($id, 5); // Wyciągnięcie nazwy filmu
        ob_start();
        echo '<h1>Film: ' . htmlspecialchars($film_id) . '</h1>';
        include 'text.html'; // Ładuje stronę z pełnym opisem filmów
        return ob_get_clean();
    }

    // Zabezpieczenie parametru
    $id_clear = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');

    // Zapytanie do bazy danych o treść strony
    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = mysqli_query($link, $query);

    if (!$result) {
        return '[Błąd zapytania do bazy danych]';
    }

    $row = mysqli_fetch_array($result);

    if (empty($row['id'])) {
        return '[Nie znaleziono strony o podanym ID]';
    } else {
        return $row['page_content']; // Zwróć treść strony
    }
}

?>