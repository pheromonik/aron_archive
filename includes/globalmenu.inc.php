<?php
echo "
<a href=\"/charakterverwaltung\" border=0>Charakterverwaltung</a> 
<a href=\"/logout.php\" border=0>Logout </a>
<a href=\"/main.php?section=message\" border=0>Nachrichten</a><br>";

include 'dbconnect.inc.php';
$uid=$_SESSION["id"];

$abfrage = "SELECT * FROM  user_daten WHERE usr_index = '$uid'";
$ergebnis = mysql_query($abfrage);

$daten = mysql_fetch_array($ergebnis);
$sicherheitslevel=$daten["usr_save"];

//echo "Dein Sicherheitslevel ist:".$sicherheitslevel;

if ($sicherheitslevel>0)
{
echo "
<a href=\"/admin\" border=0>Admintool</a><br>
";
}

//Abfrage nach dem aktuellen Guthaben des Charakters
$abfrage = "SELECT * FROM  char_daten WHERE user_id = '$uid'";
$ergebnis = mysql_query($abfrage);

$daten = mysql_fetch_array($ergebnis);
$guthaben=$daten["credits"];

echo "<p class='standardschrift'>Aktuelles Guthaben:".$guthaben."</p>";


?>