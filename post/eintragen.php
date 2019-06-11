<?php
/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "includes/dbconnect.inc.php";

$user_daten = new Asqlwrapper("user_daten");

$empf=$_POST["empfang"];

/* Übergebe die ID des Empfängers an $empfi */
$empfi=$user_daten->GetValue("usr_name","$empf","usr_index");

/* wenn der Uername nicht in der Datenbank gefunden wurde, 
dann soll eine Fehlermeldung kommen und zurück auf die Nachrichtenerstellung verwiesen werden: */

if(empty($empfi))

{
echo "Empfänger $empf konnte nicht gefunden werden.";

/*echo "<script type=\"text/javascript\">\n";
echo "window.setTimeout('open(\"http://www.aron.games/message.php?section=eingang".session_name()."=".session_id()."\", \"_self\")', 800);\n";

echo "</script>\n";*/
}



else
{


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
$message = new Asqlwrapper("message");
$input=array(array($empfi,$abs),"$titel","$text",NOW());
message->Entry("reader_ids,titel,inhalt,zeit",$input);

// echo "<script type=\"text/javascript\">\n";

// echo "window.setTimeout('open(\"http://www.aron.games/message.php?section=eingang&".session_name()."=".session_id()."\", \"_self\")', 10);\n";

// echo "</script>\n";

}