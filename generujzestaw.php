<?php session_start(); ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <meta http-equiv="Content-type" content="application/xhtml+xml; charset=iso-8859-2" />  
    <title>Logowanie na sesjach</title>
  <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<?php



if(isset($_SESSION['login'])) {
    echo '<p>Witaj, <b>'.$_SESSION['login'].'</b> <a href="wyloguj.php">Wyloguj</a></p>';
	echo 'Dane:';
}
else {
    header('Location: index.php');
}
?>


</body>
</html>