<?php
require_once '../cfg.php';

// Funkcja wyświetlania listy produktów
function PokazProdukty() {
    global $link;

    $stmt = $link->prepare("SELECT * FROM produkty LIMIT 100");
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<h1>Lista Produktów</h1>';
    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Tytuł</th><th>Kategoria</th><th>Cena netto</th><th>VAT</th><th>Ilość</th><th>Status</th><th>Akcje</th></tr>';
        while ($row = $result->fetch_assoc()) {
            $status = ($row['status_dostepnosci'] && $row['ilosc_magazyn'] > 0 && strtotime($row['data_wygasniecia']) > time()) ? 'Dostępny' : 'Niedostępny';
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . htmlspecialchars($row['tytul']) . '</td>';
            echo '<td>' . htmlspecialchars($row['kategoria_id']) . '</td>';
            echo '<td>' . $row['cena_netto'] . '</td>';
            echo '<td>' . $row['podatek_vat'] . '%</td>';
            echo '<td>' . $row['ilosc_magazyn'] . '</td>';
            echo '<td>' . $status . '</td>';
            echo '<td>
                <form method="post" action="" style="display:inline;">
                    <input type="hidden" name="id" value="' . $row['id'] . '">
                    <button type="submit" name="edytuj_produkt">Edytuj</button>
                    <button type="submit" name="usun_produkt" onclick="return confirm(\'Czy na pewno usunąć produkt?\')">Usuń</button>
                </form>
            </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Brak produktów w bazie danych.</p>';
    }
}

// Formularz dodawania produktu
function DodajProdukt() {
    echo '<h1>Dodaj Nowy Produkt</h1>';
    echo '<form method="post" action="">
        <label for="tytul">Tytuł:</label><br>
        <input type="text" id="tytul" name="tytul" required><br><br>

        <label for="opis">Opis:</label><br>
        <textarea id="opis" name="opis" required></textarea><br><br>

        <label for="cena">Cena netto:</label><br>
        <input type="number" id="cena" name="cena" step="0.01" required><br><br>

        <label for="vat">VAT (%):</label><br>
        <input type="number" id="vat" name="vat" step="0.01" value="23.00" required><br><br>

        <label for="ilosc">Ilość w magazynie:</label><br>
        <input type="number" id="ilosc" name="ilosc" required><br><br>

        <label for="kategoria">ID Kategorii:</label><br>
        <input type="number" id="kategoria" name="kategoria" required><br><br>

        <label for="data_wygasniecia">Data wygaśnięcia:</label><br>
        <input type="date" id="data_wygasniecia" name="data_wygasniecia" required><br><br>

        <label for="zdjecie">Ścieżka do zdjęcia:</label><br>
        <input type="text" id="zdjecie" name="zdjecie"><br><br>

        <input type="submit" name="zapisz_produkt" value="Dodaj Produkt">
    </form>';
}

// Formularz edycji produktu
function EdytujProdukt($id) {
    global $link;

    $stmt = $link->prepare("SELECT * FROM produkty WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $produkt = $result->fetch_assoc();

    echo '<h1>Edytuj Produkt</h1>';
    echo '<form method="post" action="">
        <input type="hidden" name="id" value="' . $id . '">
        <label for="tytul">Tytuł:</label><br>
        <input type="text" id="tytul" name="tytul" value="' . htmlspecialchars($produkt['tytul']) . '" required><br><br>

        <label for="opis">Opis:</label><br>
        <textarea id="opis" name="opis" required>' . htmlspecialchars($produkt['opis']) . '</textarea><br><br>

        <label for="cena">Cena netto:</label><br>
        <input type="number" id="cena" name="cena" step="0.01" value="' . $produkt['cena_netto'] . '" required><br><br>

        <label for="vat">VAT (%):</label><br>
        <input type="number" id="vat" name="vat" step="0.01" value="' . $produkt['podatek_vat'] . '" required><br><br>

        <label for="ilosc">Ilość w magazynie:</label><br>
        <input type="number" id="ilosc" name="ilosc" value="' . $produkt['ilosc_magazyn'] . '" required><br><br>

        <label for="kategoria">ID Kategorii:</label><br>
        <input type="number" id="kategoria" name="kategoria" value="' . $produkt['kategoria_id'] . '" required><br><br>

        <label for="data_wygasniecia">Data wygaśnięcia:</label><br>
        <input type="date" id="data_wygasniecia" name="data_wygasniecia" value="' . $produkt['data_wygasniecia'] . '" required><br><br>

        <label for="zdjecie">Ścieżka do zdjęcia:</label><br>
        <input type="text" id="zdjecie" name="zdjecie" value="' . htmlspecialchars($produkt['zdjecie']) . '"><br><br>

        <input type="submit" name="zapisz_edycje_produktu" value="Zapisz Zmiany">
    </form>';
}

// Funkcja usuwania produktu
function UsunProdukt($id) {
    global $link;

    $stmt = $link->prepare("DELETE FROM produkty WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo '<p>Produkt został usunięty.</p>';
    } else {
        echo '<p>Błąd podczas usuwania produktu: ' . $stmt->error . '</p>';
    }
}

// Obsługa żądań POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['zapisz_produkt'])) {
        global $link;

        $tytul = $_POST['tytul'];
        $opis = $_POST['opis'];
        $cena = floatval($_POST['cena']);
        $vat = floatval($_POST['vat']);
        $ilosc = intval($_POST['ilosc']);
        $status = 1; // Ustawiamy domyślnie na dostępny
        $kategoria = intval($_POST['kategoria']);
        $data_wygasniecia = $_POST['data_wygasniecia'];
        $zdjecie = $_POST['zdjecie'];

        $stmt = $link->prepare("INSERT INTO produkty (tytul, opis, data_utworzenia, cena_netto, podatek_vat, ilosc_magazyn, status_dostepnosci, kategoria_id, data_wygasniecia, zdjecie) VALUES (?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssddiiiss", $tytul, $opis, $cena, $vat, $ilosc, $status, $kategoria, $data_wygasniecia, $zdjecie);

        if ($stmt->execute()) {
            echo '<p>Produkt został dodany.</p>';
        } else {
            echo '<p>Błąd podczas dodawania produktu: ' . $stmt->error . '</p>';
        }
    } elseif (isset($_POST['edytuj_produkt'])) {
        $id = intval($_POST['id']);
        EdytujProdukt($id);
    } elseif (isset($_POST['zapisz_edycje_produktu'])) {
        global $link;

        $id = intval($_POST['id']);
        $tytul = $_POST['tytul'];
        $opis = $_POST['opis'];
        $cena = floatval($_POST['cena']);
        $vat = floatval($_POST['vat']);
        $ilosc = intval($_POST['ilosc']);
        $kategoria = intval($_POST['kategoria']);
        $data_wygasniecia = $_POST['data_wygasniecia'];
        $zdjecie = $_POST['zdjecie'];

        $stmt = $link->prepare("UPDATE produkty SET tytul = ?, opis = ?, cena_netto = ?, podatek_vat = ?, ilosc_magazyn = ?, kategoria_id = ?, data_wygasniecia = ?, zdjecie = ? WHERE id = ?");
        $stmt->bind_param("ssddiissi", $tytul, $opis, $cena, $vat, $ilosc, $kategoria, $data_wygasniecia, $zdjecie, $id);

        if ($stmt->execute()) {
            echo '<p>Produkt został zaktualizowany.</p>';
        } else {
            echo '<p>Błąd podczas aktualizacji produktu: ' . $stmt->error . '</p>';
        }
    } elseif (isset($_POST['usun_produkt'])) {
        $id = intval($_POST['id']);
        UsunProdukt($id);
    }
}

?>
