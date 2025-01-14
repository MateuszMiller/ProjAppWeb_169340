<?php
$nr_indeksu = '169340';
$nrGrupy = 'ISI3';
echo 'Mateusz Miller '.$nr_indeksu.' grupa '.$nrGrupy.'<br/><br/>';
echo 'Zastosowanie metody include() <br/>';
echo 'Plik zostanie dołączony <br/>';
include('include.php');
echo '<br/><br/>';
echo 'Zastosowanie metody require_once() <br/>';
echo 'Plik zostanie dołączony tylko raz nie ważne ile razy użyjemy require_once() <br/>';
require_once('require_once.php');
echo '<br/><br/>';
echo 'Zastosowanie warunku if, elseif, else <br/>';
echo 'Metoda porówna dwie zmienne <br/>';
$a = 5;
$b = 8;
echo 'a = '.$a.'<br/>';
echo 'b = '.$b.'<br/>';
if($a > $b){
    echo'a jest większe';
}
elseif($b > $a){
    echo'b jest większe';
}
else{
    echo'a jest równe b';
}
echo '<br/><br/>';
echo 'Zastosowanie warunku switch <br/>';
echo 'Metoda porówna dwie zmienne i jezeli znajdzie poprawny warunek, zankończy działanie<br/>';
switch (true) {
    case ($a > $b):
        echo 'a jest większe';
        break;
    case ($b > $a):
        echo 'b jest większe';
        break;
    default:
        echo 'a jest równe b';
        break;
}
echo '<br/><br/>';
echo 'Zastosowanie pętli while <br/>';
echo 'Metoda sprawi że liczby będą takie same<br/>';
echo 'a = '.$a.'<br/>';
echo 'b = '.$b.'<br/>';
while ($a != $b) {
    if ($a < $b) {
        echo 'a jest mniejsze niż b. Zwiększam a.<br/>';
        $a++;  // Increment $a
    } elseif ($a > $b) {
        echo 'a jest większe niż b. Zmniejszam a.<br/>';
        $a--;  // Decrement $a
    }
    echo 'Obecne wartości: a = '.$a.', b = '.$b.'<br/>';
}
echo 'a = '.$a.'<br/>';
echo 'b = '.$b.'<br/>';
echo '<br/><br/>';
echo 'Zastosowanie pętli for <br/>';
echo 'Metoda sprawi że liczby będą takie same<br/>';
$c = 5;
$d = 8;
echo 'c = '.$c.'<br/>';
echo 'd = '.$d.'<br/>';

if ($c < $d) {
    // If a is less than b, increment a using a for loop
    for ($i = $c; $i < $d; $i++) {
        echo 'c jest mniejsze niż d. Zwiększam c.<br/>';
        $c++;
        echo 'Obecne wartości: c = '.$c.', d = '.$d.'<br/>';
    }
} elseif ($c > $d) {
    // If a is greater than b, decrement a using a for loop
    for ($i = $c; $i > $d; $i--) {
        echo 'c jest większe niż d. Zmniejszam c.<br/>';
        $c--;
        echo 'Obecne wartości: c = '.$c.', d = '.$d.'<br/>';
    }
} else {
    echo 'c jest równe d.<br/>';
}

echo '<br/>Teraz a jest równe b: c = '.$c.', d = '.$d.'';
?>
