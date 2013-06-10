<?php

$connection = @mysql_connect('localhost', 'root', '') or die ('Brak polaczenia z baza');
$db = @mysql_select_db('pracainz', $connection) or die('Nie mogę połączyć się z bazą danych');

if (isset($_POST['konto']) and isset($_POST['password']) and isset($_POST['password2']))

{

if ($_POST['password']==$_POST['password2'])

  {

   $konto =  mysql_real_escape_string (trim($_POST['konto']));      
$password = sha1(mysql_real_escape_string (trim($_POST['password']))); 
   //$password = mysql_real_escape_string (trim($_POST['password'])); 


   $zapytanie="INSERT INTO `users` (`login`,`haslo`) VALUES ('$konto','$password')";

   mysql_query($zapytanie) or die("Wystąpił błąd" );

      echo('Konto '.$konto.' zostalo utworzone');

   }

   else
   {

   echo("Taki uzytkownik juz istnieje. Kliknij wstecz aby zarejestrowac sie ponownie");

   }
}
?>

<html>

<body>

<h1>Dodaj nowego uzytkow

nika</h1>

<form action="rejestracja.php" method="post">

<strong>Nazwa konta:</strong><input name="konto" type="text" value="" /><br>

<strong>Haslo:</strong><input name="password" type="password" value="" /><br>

<strong>Powtorz haslo:</strong><input name="password2" type="password" value="" /><br>

<input type="submit" value="Zarejestruj" />

</form>

</body>

</html>

<?php



 

?>