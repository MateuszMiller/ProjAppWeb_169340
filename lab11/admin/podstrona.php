<?php
function ListaPodstron() {
    global $link;

    $query = "SELECT id, page_title FROM page_list LIMIT 100";
    $result = mysqli_query($link, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        echo '<p>Brak podstron do wyświetlenia.</p>';
        return;
    }

    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr><th>ID</th><th>Tytuł</th><th>Akcje</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['page_title']) . '</td>';
        echo '<td>
            <form method="post" action="' . htmlspecialchars($_SERVER['REQUEST_URI']) . '">
                <input type="hidden" name="identyfikator" value="' . $row['id'] . '">
                <input type="submit" name="usun_podstrone" value="Usuń">
                <input type="submit" name="edytuj_podstrone" value="Edytuj">
            </form>
            </td>';
        echo '</tr>';
    }

    echo '</table>';
}

function DodajNowaPodstrone() {
    echo '<h1>Dodaj Nową Podstronę</h1>
    <form method="post" action="' . htmlspecialchars($_SERVER['REQUEST_URI']) . '">
        <label for="tytul">Tytuł:</label><br>
        <input type="text" id="tytul" name="page_title" required><br><br>

        <label for="tresc">Treść:</label><br>
        <textarea id="tresc" name="page_content" rows="10" cols="50" required></textarea><br><br>

        <label for="aktywna">Aktywna:</label>
        <input type="checkbox" id="aktywna" name="status"><br><br>

        <input type="submit" name="zapisz_dodaj_podstrone" value="Zapisz nową podstronę">
    </form>';
}

function PokazFormularzEdycjiPodstrony($id) {
    global $link;

    $stmt = $link->prepare("SELECT page_title, page_content, status FROM page_list WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo '<h1>Edytuj Podstronę</h1>
        <form method="post" action="' . htmlspecialchars($_SERVER['REQUEST_URI']) . '">
            <input type="hidden" name="identyfikator" value="' . $id . '">
            <label for="tytul">Tytuł:</label><br>
            <input type="text" id="tytul" name="page_title" value="' . htmlspecialchars($row['page_title']) . '" required><br><br>

            <label for="tresc">Treść:</label><br>
            <textarea id="tresc" name="page_content" rows="10" cols="50" required>' . htmlspecialchars($row['page_content']) . '</textarea><br><br>

            <label for="aktywna">Aktywna:</label>
            <input type="checkbox" id="aktywna" name="status"' . ($row['status'] ? ' checked' : '') . '><br><br>

            <input type="submit" name="zapisz_edycje_podstrony" value="Zapisz zmiany">
        </form>';
    } else {
        echo '<p>Nie znaleziono podstrony do edycji.</p>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['usun_podstrone'])) {
        $id = $_POST['identyfikator'] ?? 0;
        if ($id) {
            global $link;
            $stmt = $link->prepare("DELETE FROM page_list WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo "Podstrona została usunięta.";
            } else {
                echo "Błąd podczas usuwania podstrony: " . $stmt->error;
            }
        } else {
            echo '<p>Nieprawidłowy identyfikator do usunięcia.</p>';
        }
    } elseif (isset($_POST['zapisz_dodaj_podstrone'])) {
        global $link;

        $nowyTytul = $_POST['page_title'] ?? '';
        $nowaTresc = $_POST['page_content'] ?? '';
        $nowaAktywna = isset($_POST['status']) ? 1 : 0;

        $stmt = $link->prepare("INSERT INTO page_list (page_title, page_content, status) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nowyTytul, $nowaTresc, $nowaAktywna);

        if ($stmt->execute()) {
            echo '<p>Nowa podstrona została dodana.</p>';
            header('Location: admin_panel.php');
            exit();
        } else {
            echo '<p>Błąd podczas dodawania podstrony: ' . $stmt->error . '</p>';
        }
    } elseif (isset($_POST['edytuj_podstrone'])) {
        $id = $_POST['identyfikator'] ?? 0;
        if ($id) {
            PokazFormularzEdycjiPodstrony($id);
        } else {
            echo '<p>Nieprawidłowy identyfikator do edycji.</p>';
        }
    } elseif (isset($_POST['zapisz_edycje_podstrony'])) {
        $id = $_POST['identyfikator'] ?? 0;
        $nowyTytul = $_POST['page_title'] ?? '';
        $nowaTresc = $_POST['page_content'] ?? '';
        $nowaAktywna = isset($_POST['status']) ? 1 : 0;

        global $link;

        $stmt = $link->prepare("UPDATE page_list SET page_title = ?, page_content = ?, status = ? WHERE id = ?");
        $stmt->bind_param("ssii", $nowyTytul, $nowaTresc, $nowaAktywna, $id);

        if ($stmt->execute()) {
            echo '<p>Podstrona została zaktualizowana.</p>';
            header('Location: admin_panel.php');
            exit();
        } else {
            echo '<p>Błąd podczas aktualizacji podstrony: ' . $stmt->error . '</p>';
        }
    }
}
?>
