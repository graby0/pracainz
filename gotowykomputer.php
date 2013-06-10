<?php
include 'classes/dbconn.class.php';
$connection = dbconn::instance();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Logowanie na sesjach</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <h1>Wybierz kwotę jaką chcesz wydać na komputer:</h1>
        <div class="gotowykomputer">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <select name="cena">
                    <?php
                    $wynik = $connection->query("select idgotowykomputer, cena from gotowykomputer");
                    while ($row = mysql_fetch_array($wynik)) {
                        echo '<option value="' . $row['cena'] . '">' . $row['cena'] . '</option>';
                    }
                    ?>      
                    <input type="submit" value="Wyszukaj" class="button"/>
                </select>
            </form>
        </div>
        <?php
        if (isset($_POST['cena'])) {
            settype($_POST['cena'], 'int');
            $query = 'Select idgotowykomputer, procesor, plytaglowna, kartagraficzna, ram, dysk, nagrywarka, obudowa, zasilacz from gotowykomputer where cena =\'' . $connection->escape($_POST['cena']) . '\'';
            echo $query;
            $wynik = $connection->query($query);
            ?>
            <table id="tabela">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Procesor</th>
                        <th>Płyta Główna</th>
                        <th>Karta Graficzna</th>
                        <th>Pamięć RAM</th>
                        <th>Dysk</th>
                        <th>Nagrywarka</th>
                        <th>Obudowa</th>
                        <th>Zasilacz</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysql_fetch_array($wynik)) {
                        echo'<tr>';
                        echo'<td>' . $row['idgotowykomputer'] . '</td>';
                        echo'<td>' . $row['procesor'] . '</td>';
                        echo'<td>' . $row['plytaglowna'] . '</td>';
                        echo'<td>' . $row['kartagraficzna'] . '</td>';
                        echo'<td>' . $row['ram'] . '</td>';
                        echo'<td>' . $row['dysk'] . '</td>';
                        echo'<td>' . $row['nagrywarka'] . '</td>';
                        echo'<td>' . $row['obudowa'] . '</td>';
                        echo'<td>' . $row['zasilacz'] . '</td>';
                        echo'</tr>';
                    }
                    ?>                                      
                </tbody>
            </table>
        <?php } ?>
    </body>
</html>