<?php
require_once 'cfg.php';
require_once 'koszyk.php'; // Dodanie funkcji addToCart


// Obsługa dodawania produktu do koszyka
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dodaj'])) {
    $id_produktu = intval($_POST['id_produktu']);
    $ilosc = intval($_POST['ilosc']);

    if ($id_produktu > 0 && $ilosc > 0) {
        addToCart($id_produktu, $ilosc);
        // Przekierowanie zapobiega ponownemu przesyłaniu danych
        header("Location: index.php?idp=produkty&message=Produkt został dodany do koszyka!");
        exit;
    } else {
        echo "<p style='color: red;'>Niepoprawne dane przesłane z formularza.</p>";
    }
}

// Funkcja do wyświetlania produktów
function pokazProdukty() {
    global $link;

    $query = "SELECT * FROM produkty";
    $result = mysqli_query($link, $query);

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>Nazwa</th><th>Opis</th><th>Cena brutto</th><th>Dodaj do koszyka</th></tr>';
        while ($row = $result->fetch_assoc()) {
            $cenaBrutto = $row['cena_netto'] + ($row['cena_netto'] * $row['podatek_vat'] / 100);
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['tytul']) . '</td>';
            echo '<td>' . htmlspecialchars($row['opis']) . '</td>';
            echo '<td>' . number_format($cenaBrutto, 2) . ' PLN</td>';
            echo '<td>
                <form method="post" action="">
                    <input type="hidden" name="id_produktu" value="' . $row['id'] . '">
                    <input type="number" name="ilosc" value="1" min="1">
                    <button type="submit" name="dodaj">Dodaj</button>
                </form>
            </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "<p>Brak produktów w bazie danych.</p>";
    }
}

// Wyświetlenie komunikatu o dodaniu do koszyka (jeśli istnieje)
if (isset($_GET['message'])) {
    echo '<p style="color: green;">' . htmlspecialchars($_GET['message']) . '</p>';
}

pokazProdukty();
?>
