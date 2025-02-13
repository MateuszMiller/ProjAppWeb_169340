<?php
require_once 'cfg.php';

// Funkcja do dodania produktu do koszyka
function addToCart($id_produktu, $ilosc) {
    global $link;

    if (!isset($_SESSION['id_sesji'])) {
        $_SESSION['id_sesji'] = session_id();
    }
    $id_sesji = $_SESSION['id_sesji'];

    $query_check = "SELECT * FROM koszyk WHERE id_sesji = '$id_sesji' AND id_produktu = $id_produktu";
    $result_check = mysqli_query($link, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        $row = mysqli_fetch_assoc($result_check);
        $nowa_ilosc = $row['ilosc'] + $ilosc;
        $query_update = "UPDATE koszyk SET ilosc = $nowa_ilosc WHERE id = {$row['id']}";
        mysqli_query($link, $query_update);
    } else {
        $query_insert = "INSERT INTO koszyk (id_sesji, id_produktu, ilosc) VALUES ('$id_sesji', $id_produktu, $ilosc)";
        mysqli_query($link, $query_insert);
    }
}

// Funkcja do usuwania określonej liczby produktów z koszyka
function removeFromCart($id_produktu, $ilosc) {
    global $link;

    if (!isset($_SESSION['id_sesji'])) {
        return;
    }
    $id_sesji = $_SESSION['id_sesji'];

    // Sprawdzenie, czy produkt istnieje w koszyku
    $query_check = "SELECT * FROM koszyk WHERE id_sesji = '$id_sesji' AND id_produktu = $id_produktu";
    $result_check = mysqli_query($link, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        $row = mysqli_fetch_assoc($result_check);
        $nowa_ilosc = $row['ilosc'] - $ilosc;

        if ($nowa_ilosc > 0) {
            // Aktualizacja ilości, jeśli pozostają produkty
            $query_update = "UPDATE koszyk SET ilosc = $nowa_ilosc WHERE id = {$row['id']}";
            mysqli_query($link, $query_update);
        } else {
            // Usunięcie rekordu, jeśli ilość spada do 0 lub mniej
            $query_delete = "DELETE FROM koszyk WHERE id = {$row['id']}";
            mysqli_query($link, $query_delete);
        }
    }
}

// Funkcja do wyświetlania koszyka
function showCart() {
    global $link;

    if (!isset($_SESSION['id_sesji'])) {
        echo "<p>Koszyk jest pusty.</p>";
        return;
    }
    $id_sesji = $_SESSION['id_sesji'];

    // Pobranie produktów z bazy danych
    $query = "
        SELECT produkty.id AS id_produktu, produkty.tytul, produkty.cena_netto, produkty.podatek_vat, koszyk.ilosc,
               (produkty.cena_netto + (produkty.cena_netto * produkty.podatek_vat / 100)) AS cena_brutto
        FROM koszyk
        JOIN produkty ON koszyk.id_produktu = produkty.id
        WHERE koszyk.id_sesji = '$id_sesji'
    ";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1">';
        echo '<tr><th>Nazwa</th><th>Cena netto</th><th>VAT</th><th>Cena brutto</th><th>Ilość</th><th>Razem brutto</th><th>Akcje</th></tr>';
        $total = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $tytul = htmlspecialchars($row['tytul'] ?? 'Brak danych');
            $cena_netto = $row['cena_netto'] ?? 0.00;
            $vat = $row['podatek_vat'] ?? 0.00;
            $ilosc = $row['ilosc'] ?? 0;
            $cena_brutto = $row['cena_brutto'] ?? 0.00;
            $razem = $cena_brutto * $ilosc;
            $total += $razem;

            echo '<tr>';
            echo '<td>' . $tytul . '</td>';
            echo '<td>' . number_format($cena_netto, 2) . ' PLN</td>';
            echo '<td>' . number_format($vat, 2) . '%</td>';
            echo '<td>' . number_format($cena_brutto, 2) . ' PLN</td>';
            echo '<td>' . $ilosc . '</td>';
            echo '<td>' . number_format($razem, 2) . ' PLN</td>';
            echo '<td>
                    <form method="post" action="">
                        <input type="hidden" name="id_produktu" value="' . $row['id_produktu'] . '">
                        <input type="number" name="ilosc" value="1" min="1">
                        <button type="submit" name="usun">Usuń</button>
                    </form>
                  </td>';
            echo '</tr>';
        }
        echo '<tr><td colspan="5">Łączna wartość brutto</td><td>' . number_format($total, 2) . ' PLN</td><td></td></tr>';
        echo '</table>';
    } else {
        echo "<p>Koszyk jest pusty.</p>";
    }
}

// Obsługa żądań POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usun'])) {
    $id_produktu = intval($_POST['id_produktu']);
    $ilosc = intval($_POST['ilosc']);
    removeFromCart($id_produktu, $ilosc);
}
?>
