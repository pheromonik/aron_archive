<?php

//Datenbankverbindung wird aufgebaut
include 'includes/dbconnect.inc.php';

//HTML HEADER laden
include 'header.html';

//echo $_SESSION["name"];

$uid=$_SESSION["id"];


if (empty($_SESSION["id"]))

{
echo "Deine Session ist leider abgelaufen. Bitte logge dich neu ein!"; 
echo "<script type=\"text/javascript\">\n";
echo "window.setTimeout('open(\"http://www.aron.games/logout.php\", \"_self\")', 0.10);\n";
echo "</script>\n";
}
else
{

$pnid=$_GET["pnid"];

//Abfrage nach der ausgewählten Nachrichten: 

$uid=$_SESSION["id"];

$abfrage = "SELECT * FROM  message WHERE pn_id='$pnid'";
$ergebnis = mysql_query($abfrage);
$datenu = mysql_fetch_array($ergebnis);

$abs_id=$datenu["abs_id"];
$betreff=$datenu["titel"];

$abfrage2 = "SELECT * FROM  user_daten WHERE usr_index='$abs_id'";
$ergebnis2 = mysql_query($abfrage2);
$daten = mysql_fetch_array($ergebnis2);

//Entferne html-Tags:

$text=$datenu["inhalt"];
$text= strip_tags($text);

//Anzeigenlassen der Zeilenumbrüche
$text = nl2br($text);


//Abfrage nach dem Avatar


$abfrage = "SELECT * FROM  `user_daten`  WHERE `usr_index`='$abs_id'";
$ergebnis = mysql_query($abfrage);
$daten = mysql_fetch_array($ergebnis);


//Abfrage nach der Avaid
/*$avaid=$daten["usr_avaid"];


//Abfrage nach dem Avatar
$abfrage2 = "SELECT * FROM  `avatare`  WHERE `avaid`='$avaid'";
$ergebnis2 = mysql_query($abfrage2);
$daten2 = mysql_fetch_array($ergebnis2);

$avaname=$daten2["avaname"];
$avaendung=$daten2["avaendung"];
$avatar=$avaname.".".$avaendung;

*/

//FORMATIERUNG der Zeit und Datumsausgabe: 
$z=$datenu["zeit"];
$zeit= substr($z,8,2).".".substr($z,5,2).".".substr($z,0,4)." ".substr($z,11);

//Textformatierung: 
$convert = array (
      '[b]' => '<b>', //bold
      '[/b]' => '</b>',   
      '[center]' => '<div align=\"center\">',
      '[/center]' => '</div>',  
      '[i]' => '<i>',
      '[/i]' => '</i>',  
      '[list]' => '<ul>', 
      '[/list]' => '</ul>',
      '[*]' => '<li>'
);
  
$text = str_replace(array_keys($convert), array_values($convert), $text);

//Anzeige der Nachrichten: 
echo
"<table class=\"inner\" width=\"450 px\">
<tr>
<td class='standardschrift'>Platzhalter Avatar </td>
</tr>
<tr>
<td class='standardschrift'><a href=\"/main.php?section=profil&userid=".$abs_id."\">" 
.$daten["usr_name"].
"</a> schrieb am "
.$zeit.
"</td></tr><tr><td class='standardschrift'>"
.$datenu["titel"].
"</td></tr><tr><td width=\"450 px\"><pre width=\"85\" class='standardschrift'>"
.$text.
"</pre></td></tr></table>";

/* Ändere den Status der Nachricht - 0=ungelesen, 1 = gelesen */
$aendern = "UPDATE message Set status='1' WHERE pn_id = '$pnid'";
$update = mysql_query($aendern);

echo "<a href=\"/message.php?section=reply&empfuid=".$abs_id."&betreff=".$betreff." \"> >>antworten<<</a>";


}

?>









