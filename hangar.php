<?php

include 'includes/globalmenu.inc.php';
//Abfrage Daten Charakter
$uid=$_SESSION["id"];
$abfrage = "SELECT * FROM  char_daten WHERE user_id = '$uid' ";
$ergebnis = mysql_query($abfrage);
$daten = mysql_fetch_array($ergebnis);
$charname= $daten["char_name"];
$aufenthalt= $daten["char_aufenthalt"];

//Abfrage Daten Aufenhalt
$abfrage = "SELECT * FROM  planets WHERE pla_id = '$aufenthalt' ";
$ergebnis = mysql_query($abfrage);
$daten = mysql_fetch_array($ergebnis);

$aufenthalt=$daten["pla_name"];
echo "<p class='standardschrift'>Hallo, ".$charname.". Du bist zur Zeit auf ".$aufenthalt;
echo ". Hier im Hangar der Station kannst du dir ein Schiff kaufen oder mieten, eine Passage kaufen oder auf einem Schiff anheuern.</p>"
?>