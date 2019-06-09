<?php
/* Session starten oder wieder aufnehmen*/
session_start(); 

/* Bei einem Aufruf von der Login-Seite: */
include_once 'includes/dbconnect.inc.php';if (isset($_POST["Mailadresse"]))
{	echo "Soweit klar."; 
/* Wenn Name und Passwort korrekt $fmail= $_POST["Mailadresse"];$abfrage = "SELECT * FROM  user_daten WHERE usr_mail LIKE '$fname' ";
$ergebnis = mysql_query($abfrage);
$daten = mysql_fetch_array($ergebnis);
echo $daten["usr_mail"]; 
//echo " ".$_POST["Password"];
$dname=$daten["usr_mail"];
$dpw=$daten["usr_passwort"];

$pwmd=md5($_POST["Password"]);



If($pwmd == $dpw)
{
//LEGE DIE SESSION-DATEN FEST: 
$_SESSION["mail"]= $dname;
$_SESSION["pw"]= $dpw;
$_SESSION["id"] = $daten["usr_index"];
$_SESSION["status"] = $daten["usr_first_login"];
$uid=$_SESSION["id"];



echo "<html>\n";
echo "<head>\n";
echo "<script type=\"text/javascript\">\n";
echo "window.setTimeout('open(\"http://www.aron.games/main.php?".session_name()."=".session_id()."\", \"_self\")', 3);\n";
echo "</script>\n";
echo "<style type=\"text/css\">\n";
echo "body {background-color: #F6F6F6; margin-top:0}\n";
echo "</style>\n";

echo "</head>\n";
echo "<body>\n";
echo "<table width=\"100%\" height=\"90%\" border=\"0\">\n";
echo "<tr>\n";
echo "<td align=\"center\" valign=\"bottom\">\n";
echo "<br>";
echo "</div>\n";

echo "</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td align=\"center\" valign=\"top\">\n";
echo "<a href=\"http://www.aron.games/main.php?".session_name()."=".session_id()."\"> Sollte der automatische Link nicht funktionieren, benutzen Sie bitte den hier </a>\n";
echo "</td>\n";
echo "</tr>\n";
echo "</table> \n";

echo "</body>\n";
echo "</html>\n"; */
}


else
{echo "Leider waren deine Angaben nicht korrekt. <br>";echo $POST_["Mailadresse"]." "$POST_["Password"];
//echo "<a href=\"http://www.aron.games/logout.php?".session_name()."\"> Session löschen</a>\n";
}}

?>