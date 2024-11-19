<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

// Domyślnie ustawiamy stronę główną
if ($_GET['idp'] == '') {
    $strona = 'html/glowna.html';
} elseif ($_GET['idp'] == 'podstrona1') {
    $strona = 'html/podstrona1.html';
} elseif ($_GET['idp'] == 'podstrona2') {
    $strona = 'html/podstrona2.html';
} else {
    $strona = 'html/404.html'; // Dodaj plik 404 dla stron nieistniejących
}

// Sprawdzenie, czy plik istnieje
if (!file_exists($strona)) {
    $strona = 'html/404.html';
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamiczna Strona</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/timedate.js" type="text/javascript"></script>
</head>
<body onload="startClock()">
    <header>
        <h1>Dynamiczna Strona</h1>
        <nav>
            <a href="index.php?idp=">Strona główna</a>
            <a href="index.php?idp=podstrona1">Podstrona 1</a>
            <a href="index.php?idp=podstrona2">Podstrona 2</a>
        </nav>
    </header>
    <main>
        <?php include($strona); ?>
    </main>
    <footer>
        <p>&copy; 2024 Dynamiczna Strona. Wszelkie prawa zastrzeżone.</p>
        <?php
        $nr_indeksu = '1234567';
        $nrGrupy = 'X';
        echo 'Autor: Jan Kowalski '.$nr_indeksu.' grupa '.$nrGrupy.' <br /><br />';
        ?>
    </footer>
</body>
</html>