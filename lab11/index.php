<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

include('cfg.php');
include('showpage.php'); // Plik zawierający funkcję PokazPodstrone()
$idp = isset($_GET['idp']) ? $_GET['idp'] : 'glowna';

// Określenie ID strony na podstawie parametru idp
if ($idp == 'glowna') {
    $id = 1; 
} elseif ($idp == 'kontakt') {
    $id = 3;
} elseif ($idp == 'filmy') {
    $id = 2; 
} elseif ($idp == 'o_mnie') {
    $id = 4; 
} elseif ($idp == 'ogladanie') {
    $id = 5; 
} elseif ($idp == 'ranking') {
    $id = 6; 
} elseif ($idp == 'spis_filmow') {
    $id = 7; 
} else {
    $id = 8; // Domyślna strona lub strona błędu
}

// Generowanie zawartości strony
$page_content = PokazPodstrone($id);
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
    <body onload="startClock()" class="<?php echo $darkModeClass; ?>"> <!-- Dodajemy zmienną PHP dla klasy body -->
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
                    <a href="index.php?idp=ogladanie">Oglądanie</a>
                    <a href="index.php?idp=ranking">Ranking</a>
                    <a href="index.php?idp=spis_filmow">Spis filmów</a>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="content">
                    <?php echo $page_content; ?>
                </td>
            </tr>
        </table>
        <?php
            $nr_indeksu = '169340';
            $nrGrupy = '3';
            echo 'Autor: Mateusz Miller '.$nr_indeksu.' grupa '.$nrGrupy;
        ?>
    </body>
</html>

