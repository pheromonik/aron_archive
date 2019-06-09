<?php
/* Session starten oder wieder aufnehmen*/
session_start(); 

/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*Öffnen der DB*/
include 'includes/dbconnect.inc.php';

/*Übergabe der Session-Variablen und Variablen aus dem Formular */ 


$uid=$_SESSION["id"];
echo $uid;

echo "Name:".$_POST["vorname"];
$name=$_POST["vorname"];

echo "Fraktion:".$_POST["Fraktion"];
$fraktion=$_POST["Fraktion"];

echo "Wert BordG".$_POST["BG"]."<br>";
$bordg=$_POST["BG"];

echo "Wert Konst".$_POST["Konst"]."<br>";
$konst=$_POST["Konst"];

echo "Wert Nahka".$_POST["Nahka"]."<br>";
$nahka=$_POST["Nahka"];

echo "Wert Pilot".$_POST["Pilot"]."<br>";
$pilot=$_POST["Pilot"];

echo "Wert schus".$_POST["schus"]."<br>";
$schus=$_POST["schus"];

echo "Wert Astro".$_POST["Astro"]."<br>";
$astro=$_POST["Astro"];

echo "Wert Compu".$_POST["Compu"]."<br>";
$compu=$_POST["Compu"];

echo "Wert Mediz".$_POST["Mediz"]."<br>";
$mediz=$_POST["Mediz"];

echo "Wert Repar".$_POST["Repar"]."<br>";
$repar=$_POST["Repar"];

echo "Wert Senso".$_POST["Senso"]."<br>";
$senso=$_POST["Senso"];

echo "Wert Etike".$_POST["Etike"]."<br>";
$etike=$_POST["Etike"];

echo "Wert Feils".$_POST["Feils"]."<br>";
$feils=$_POST["Feils"];

echo "Wert Komma".$_POST["Komma"]."<br>";
$komma=$_POST["Komma"];

echo "Wert Luege".$_POST["Luege"]."<br>";
$luege=$_POST["Luege"];

echo "Wert Ueber".$_POST["Ueber"]."<br>";
$ueber=$_POST["Ueber"];

echo "Wert Physi".$_POST["Physi"]."<br>";
$physi=$_POST["Physi"];

echo "Wert Intel".$_POST["Intel"]."<br>";
$intel=$_POST["Intel"];

echo "Wert Wirku".$_POST["Wirku"]."<br>";
$wirku=$_POST["Wirku"];

echo "Wert Telep".$_POST["Telep"]."<br>";
$telep=$_POST["Telep"];


//eintragen in die DB
$SQLLAB="INSERT INTO `char_daten`(
    `char_id`,
    `user_id`,
    `char_name`,
    `char_aufenthalt`,
    `Fraktion`,
    `Physis`,
    `Intellekt`,
    `Wirkung`,
    `Telepathie`,
    `Phy1_BG`,
    `Phy2_Kon`,
    `Phy3_NK`,
    `Phy4_Pil`,
    `Phy5_SW`,
    `Int1_Astro`,
    `Int2_Comp`,
    `Int3_Med`,
    `Int4_Rep`,
    `Int5_Sens`,
    `Wirk1_Etik`,
    `Wirk2_Feilsch`,
    `Wirk3_Komm`,
    `Wirk4_Lueg`,
    `Wirk5_Ueberz`)
VALUES(
    NULL,
    '$uid',
    '$name',
    '1',
    '$fraktion',
    '$physi',
    '$intel',
    '$wirku',
    '$telep',
    '$bordg',
    '$konst',
    '$nahka',
    '$pilot',
    '$schus',
    '$astro',
    '$compu',
    '$mediz',
    '$repar',
    '$senso',
    '$etike',
    '$feils',
    '$komma',
    '$luege',
    '$ueber'
)";
$eintragen = mysql_query($SQLLAB);/* Leite weiter auf die Main-Page: */echo "<html>\n";echo "<head>\n";echo "<script type=\"text/javascript\">\n";echo "window.setTimeout('open(\"http://www.aron.games/main.php?".session_name()."=".session_id()."\", \"_self\")', 3);\n";echo "</script>\n";echo "<style type=\"text/css\">\n";echo "body {background-color: #F6F6F6; margin-top:0}\n";echo "</style>\n";echo "</head>\n";echo "<body>\n";echo "<table width=\"100%\" height=\"90%\" border=\"0\">\n";echo "<tr>\n";echo "<td align=\"center\" valign=\"bottom\">\n";echo "<br>";echo "</div>\n";echo "</td>\n";echo "</tr>\n";echo "<tr>\n";echo "<td align=\"center\" valign=\"top\">\n";echo "<a href=\"http://www.aron.games/main.php?".session_name()."=".session_id()."\"> Sollte der automatische Link nicht funktionieren, benutzen Sie bitte den hier </a>\n";echo "</td>\n";echo "</tr>\n";echo "</table> \n";echo "</body>\n";echo "</html>\n"; 

?>

