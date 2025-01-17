<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

include('cfg.php');
include('showpage.php'); // Plik zawierający funkcję PokazPodstrone()
include('user.php'); // Plik zawierający funkcję Wyloguj()

$idp = isset($_GET['idp']) ? $_GET['idp'] : 'glowna';

// Handle logout action
if (isset($_GET['action']) && $_GET['action'] === 'wyloguj') {
    Wyloguj(); // Call the logout function
    header("Location: index.php"); // Redirect to the main page after logout
    exit;
}

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
} elseif ($idp == 'produkty') {
    $id = 8; 
} elseif ($idp == 'koszyk') {
    $id = 9; 
} elseif ($idp == 'filmy') {
    $id = 10; 
} elseif ($idp == 'user') {
    $id = 11; 
} elseif (isset($_GET['film'])) { 
    $film = htmlspecialchars($_GET['film'], ENT_QUOTES, 'UTF-8'); 
    $id = 'film_' . $film; 
} elseif ($idp === 'produkty' && isset($_GET['kategoria'])) {
    include 'products.php';
    PokazProdukty();
    exit;
} else {
    $id = 12; // Domyślna strona lub strona błędu
}

// Generowanie zawartości strony
$page_content = PokazPodstrone($id);

if (isset($_GET['id'])) {
    $fragment = htmlspecialchars($_GET['id']); // Sanityzacja
    header("Location: #" . $fragment); // Przekierowanie
    exit;
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
        <script src="js/filtrowanie.js" type="text/javascript"></script>
    </head>
    <body onload="startClock()" class="<?php echo $darkModeClass; ?>">
        <table>
            <tr>
                <td colspan="2" class="header">
                    <!-- Render login/logout button -->
                    <?php
                    // Check if the user is logged in
                    $isLoggedIn = isset($_SESSION['logged_in_user']) && isset($_SESSION['logged_in_user']['id']);

                    if ($isLoggedIn) {
                        echo '<a href="index.php?action=wyloguj" class="zaloguj">Wyloguj</a>';
                    } else {
                        echo '<a href="index.php?idp=user" class="zaloguj">Zaloguj</a>';
                    }
                    ?>
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
                    <a href="index.php?idp=filmy">Filmy</a>
                    <a href="index.php?idp=ranking">Ranking</a>
                    <a href="index.php?idp=spis_filmow">Spis filmów</a>
                    <a href="index.php?idp=produkty">Produkty</a>
                    <a href="index.php?idp=koszyk">Koszyk</a>
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
