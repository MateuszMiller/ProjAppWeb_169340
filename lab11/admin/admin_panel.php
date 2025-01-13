<?php
require_once '../cfg.php';
require_once 'podstrona.php';
require_once 'kategorie.php';
require_once 'produkty.php';

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: admin.php');
    exit();
}

echo '<h1>Witaj w panelu administracyjnym!</h1>
<a href="logout.php">Wyloguj</a>';

// Sekcja podstron
echo '<h1>Lista Podstron</h1>';
ListaPodstron();
DodajNowaPodstrone();

// Sekcja kategorii
echo '<h1>Lista Kategorii</h1>';
generujDrzewoKategorii();
DodajNowaKategorie();

//Sekcja produktów
PokazProdukty();
DodajProdukt();
?>