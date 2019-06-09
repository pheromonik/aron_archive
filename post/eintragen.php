<?php
/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "includes/dbconnect.inc.php";


$empf=$_POST["empfang"];

/* Suche die userid des Empfängers heraus: */
$abfrage = "SELECT * FROM  user_daten WHERE usr_name LIKE '$empf'";
$ergebnis = mysql_query($abfrage);
$datenu = mysql_fetch_array($ergebnis);


/* wenn der Username nicht in der Datenbank gefunden wurde, 
dann soll eine Fehlermeldung kommen und zurück auf die Nachrichtenerstellung verwiesen werden: */


if(empty($datenu["usr_index"]))

{
echo "Es konnte leider kein Empfänger mit diesem Namen gefunden werden.";
echo $empf;

/*echo "<script type=\"text/javascript\">\n";
echo "window.setTimeout('open(\"http://www.aron.games/message.php?section=eingang".session_name()."=".session_id()."\", \"_self\")', 800);\n";

echo "</script>\n";*/
}



else
{


/* Übergebe die ID des Empfängers an $empfi */

$empfi=$datenu["usr_index"];


/*Bestimme den Absender(id)*/
$abs=$_SESSION["id"];

/*Übergebe den Titel*/
$titel=$_POST["betreff"];

/*Übergebe den Text */
$text=$_POST["text"];



/* HTML- und anderen CODE-Tags extrahieren
*/
$text = strip_tags($text);


/*Schreibe die Nachricht in die Datenbank */
$Sqlab = "INSERT INTO message (empf_id,abs_id,inhalt,titel,zeit)  VALUES ('$empfi','$abs','$text','$titel',NOW())";
$eintragen = mysql_query($Sqlab);



 
echo "<script type=\"text/javascript\">\n";

echo "window.setTimeout('open(\"http://www.aron.games/message.php?section=eingang&".session_name()."=".session_id()."\", \"_self\")', 10);\n";

echo "</script>\n";

//echo $Sqlab;

}