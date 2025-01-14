<?php
require_once '../cfg.php';

// Funkcja generująca drzewo kategorii
function generujDrzewoKategorii($matka = 0, $poziom = 0, $maksymalnaGlebokosc = 10) {
    global $link;

    if ($poziom >= $maksymalnaGlebokosc) {
        return;
    }

    $stmt = mysqli_prepare($link, "SELECT id, nazwa FROM kategorie WHERE matka = ? LIMIT 100");
    mysqli_stmt_bind_param($stmt, 'i', $matka);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        echo '<ul>';
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . htmlspecialchars($row['nazwa']) . 
                 ' <form style="display:inline;" method="post" action="">
                    <input type="hidden" name="identyfikator" value="' . $row['id'] . '">
                    <button type="submit" name="edytuj_kategorie">Edytuj</button>
                    <button type="submit" name="usun_kategorie" onclick="return confirm(\'Czy na pewno chcesz usunąć tę kategorię?\')">Usuń</button>
                </form>';
            generujDrzewoKategorii($row['id'], $poziom + 1);
            echo '</li>';
        }
        echo '</ul>';
    }
}

// Funkcja dodawania nowej kategorii
function DodajNowaKategorie() {
    echo '<h1>Dodaj Nową Kategorię</h1>
    <form method="post" action="">
        <label for="nazwa">Nazwa kategorii:</label><br>
        <input type="text" id="nazwa" name="nazwa" required><br><br>

        <label for="matka">Kategoria nadrzędna (ID):</label><br>
        <input type="number" id="matka" name="matka" value="0"><br><br>

        <input type="submit" name="zapisz_dodaj_kategorie" value="Zapisz nową kategorię">
    </form>';
}

// Funkcja wyświetlania formularza edycji kategorii
function PokazFormularzEdycjiKategorii($id) {
    global $link;

    $stmt = $link->prepare("SELECT nazwa, matka FROM kategorie WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nazwa, $matka);
    $stmt->fetch();
    $stmt->close();

    echo '<h1>Edytuj Kategorię</h1>
    <form method="post" action="">
        <input type="hidden" name="identyfikator" value="' . $id . '">
        <label for="nazwa">Nazwa kategorii:</label><br>
        <input type="text" id="nazwa" name="nazwa" value="' . htmlspecialchars($nazwa) . '" required><br><br>

        <label for="matka">Kategoria nadrzędna (ID):</label><br>
        <input type="number" id="matka" name="matka" value="' . htmlspecialchars($matka) . '"><br><br>

        <input type="submit" name="zapisz_edycje_kategorii" value="Zapisz zmiany">
    </form>';
}

// Funkcja usuwania kategorii
function UsunKategorie($id) {
    global $link;

    // Sprawdź, czy kategoria istnieje
    $stmtCheck = $link->prepare("SELECT COUNT(*) FROM kategorie WHERE id = ?");
    $stmtCheck->bind_param("i", $id);
    $stmtCheck->execute();
    $stmtCheck->bind_result($exists);
    $stmtCheck->fetch();
    $stmtCheck->close();

    if ($exists === 0) {
        echo "<p style='color: red;'>Błąd: Kategoria o ID $id nie istnieje.</p>";
        return;
    }

    // Usuń kategorię
    $stmt = $link->prepare("DELETE FROM kategorie WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<p>Kategoria o ID $id została usunięta.</p>";
    } else {
        echo "<p>Błąd podczas usuwania kategorii: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

// Obsługa żądań POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['zapisz_dodaj_kategorie'])) {
        global $link;

        $nazwa = $_POST['nazwa'] ?? '';
        $matka = intval($_POST['matka'] ?? 0);

        // Sprawdź, czy ID kategorii nadrzędnej istnieje, jeśli matka != 0
        if ($matka !== 0) {
            $stmt = $link->prepare("SELECT COUNT(*) FROM kategorie WHERE id = ?");
            $stmt->bind_param("i", $matka);
            $stmt->execute();
            $stmt->bind_result($exists);
            $stmt->fetch();
            $stmt->close();

            if ($exists === 0) {
                echo '<p style="color: red;">Błąd: Kategoria nadrzędna o ID ' . $matka . ' nie istnieje.</p>';
                return;
            }
        }

        $stmt = $link->prepare("INSERT INTO kategorie (nazwa, matka) VALUES (?, ?)");
        $stmt->bind_param("si", $nazwa, $matka);

        if ($stmt->execute()) {
            echo '<p>Nowa kategoria została dodana.</p>';
            header('Location: admin_panel.php');
            exit();
        } else {
            echo '<p>Błąd podczas dodawania kategorii: ' . $stmt->error . '</p>';
        }
    } elseif (isset($_POST['edytuj_kategorie'])) {
        $id = intval($_POST['identyfikator']);
        PokazFormularzEdycjiKategorii($id);
    } elseif (isset($_POST['zapisz_edycje_kategorii'])) {
        global $link;

        $id = intval($_POST['identyfikator']);
        $nazwa = $_POST['nazwa'] ?? '';
        $matka = intval($_POST['matka'] ?? 0);

        $stmt = $link->prepare("UPDATE kategorie SET nazwa = ?, matka = ? WHERE id = ?");
        $stmt->bind_param("sii", $nazwa, $matka, $id);

        if ($stmt->execute()) {
            echo '<p>Kategoria została zaktualizowana.</p>';
            header('Location: admin_panel.php');
            exit();
        } else {
            echo '<p>Błąd podczas aktualizacji kategorii: ' . $stmt->error . '</p>';
        }
    } elseif (isset($_POST['usun_kategorie'])) {
        $id = intval($_POST['identyfikator']);
        UsunKategorie($id);
    }
}
?>
