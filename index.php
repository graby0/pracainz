<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
  <meta http-equiv="Content-type" content="application/xhtml+xml; charset=iso-8859-2" />
  <title>Logowanie na sesjach</title>
  <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>


<div class="logowanie">
    <form action="logowanie.php" method="POST">
        <label>Nazwa uzytkownika:</label><input type="text" name="login" />
        <label>Haslo:</label><input type="password" name="haslo" /><br />
        <label> </label><input type="submit" value="Loguj" class="button"/>
    </form>
</div>
<br>

<div class="rejestracja">
    <form action="rejestracja.php" method="POST">
        <label> </label><input type="submit" value="Zarejestruj sie" class="button"/>
    </form>
</div>
<br>

<div class="gotowykomputer">
    <form action="gotowykomputer.php" method="POST">
	<label> </label><input type="submit" value="Przejdz do gotowych zestawow" class="button"/>
    </form>
</div>

</body>
</html>
