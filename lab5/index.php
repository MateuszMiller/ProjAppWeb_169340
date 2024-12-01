<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

// Sprawdzamy, czy tryb ciemny jest ustawiony w ciasteczkach
if (isset($_COOKIE['darkMode']) && $_COOKIE['darkMode'] == 'enabled') {
    $darkModeClass = 'dark-mode';  // Tryb ciemny włączony
} else {
    $darkModeClass = '';  // Tryb jasny
}

if (!isset($_GET['idp']) || $_GET['idp'] == 'glowna') {
    $strona = 'html/glowna.html';
} elseif ($_GET['idp'] == 'kontakt') {
    $strona = 'html/kontakt.html';
} elseif ($_GET['idp'] == 'o_mnie') {
    $strona = 'html/o_mnie.html';
} elseif ($_GET['idp'] == 'ogladanie') {
    $strona = 'html/ogladanie.html';
} elseif ($_GET['idp'] == 'ranking') {
    $strona = 'html/ranking.html';
} elseif ($_GET['idp'] == 'spis_filmow') {
    $strona = 'html/spis_filmow.html';
} else {
    $strona = 'html/404.html'; 
}

if (!file_exists($strona)) {
    $strona = 'html/404.html';
}
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Filmy Oskarowe</title>
        <link rel="stylesheet" href="css/main.css">
        <meta name="Author" content="Mateusz Miller" />
        <script src="js/timedate.js" type="text/javascript"></script>
        <script src="js/darkMode.js" type="text/javascript"></script>
    </head>
    <body onload="startClock()" class="<?php echo $darkModeClass; ?>">  <!-- Dodajemy zmienną PHP dla klasy body -->
    <table>
        <tr>
            <td colspan="2" class="header">
                <h1>Strona główna</h1>
                    <div class="clock-container">
                        <div id="data"></div>
                        <div id="zegarek"></div>
                    </div>
                    <button class="darkmodebutton" onclick="toggleDarkMode()">Przełącz tryb</button>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="menu">
                <a href="index.php?idp=glowna">Strona główna</a>
                <a href="index.php?idp=kontakt">Kontakt</a>
                <a href="index.php?idp=o_mnie">O mnie</a>
                <a href="index.php?idp=ogladanie">Ogladanie</a>
                <a href="index.php?idp=ranking">Ranking</a>
                <a href="index.php?idp=spis_filmow">Spis filmów</a>
            </td>
        </tr>
        <main>
            <?php include($strona); ?>
        </main>
    </table>
        <?php
            $nr_indeksu = '169340';
            $nrGrupy = '3';
            echo 'Autor: Mateusz Miller '.$nr_indeksu.' grupa '.$nrGrupy;
        ?>
    </body>
</html>

