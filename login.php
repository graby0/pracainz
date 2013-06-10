<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['haslo']);
 
$connection = @mysql_connect('localhost', 'root', '') or die ('Brak polaczenia z baza');
$db = @mysql_select_db('pracainz', $connection) or die('Nie mogę połączyć się z bazą danych');
/* zabezpieczamy dane: */
$login = mysql_real_escape_string(trim($_POST['login']));
$haslo = mysql_real_escape_string(trim($_POST['haslo']));
 
/* sprawdzamy czy zostały podane */
if(!empty($login) && !empty($haslo)) {
        /* LIMIT 1 dla optymalizacji, zamiast tego możesz dać unikalny index na Login */
        /* Dla czytelności dużymi piszemy składnię: SELECT, FROM, WHERE, AND, OR, LIMIT etc. */
        /* do zapytania przekazujemy zabezpieczone dane */
        $query = "SELECT `iduser`, `login`, `haslo`,  FROM `users` WHERE `login` = '{$login}' AND `haslo` = '{$haslo}' LIMIT 1";
        $wynik = mysql_query($query);
 
        /* Poprawne dane oznaczają, że zapytanie zwraca jakiś rekord */
        if($dane = mysql_fetch_array($wynik)) {
                /* Możesz to użyć w innych zapytaniach (typu dodaj obrazek bez szukania id usera): */
                //$_SESSION['id'] = $dane['idKlienci'];
                
                $_SESSION['login'] = $login;
                $_SESSION['haslo'] = $haslo;
        /* Nie ma takiego konta: */
        } else {
                /* możesz z użyciem $_GET['blad'] w index.php wyświetlić stosowny komunikat. */
                //header('Location: index.php?blad=tak');
                header('Location: dodajklient.php');
                exit;
        }
/* Brak danych: */
} else {
        /* jak wyżej, tutaj możesz podać np. 'brak', dla rozróżnienia błędnych danych i ich braku */
        //header('Location: index.php?blad=brak');
        header('Location: index.php');
        exit;
}
?>