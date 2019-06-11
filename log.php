<?php
session_start(); //Start der Session
/* Bei einem Aufruf von der Login-Seite: */
include_once 'includes/dbconnect.inc.php';
include_once 'includes/area51.inc.php';

$Mailadresse = $_POST['Mailadresse'];

if(!isset($Mailadresse) OR empty($Mailadresse)) 
{       $Mailadresse = "fehlt";}
else{
/*Übergebe die Formulavariable Mailadresse: */	
$fmail=$_POST["Mailadresse"];
//echo $fmail;
}

/*Übergebe die Formularvariable Passwort: */
$fpw=$_POST["Password"];
echo "Passwort".$fpw;

/* Suche in der Datenbank die Mailadresse heraus: */
$abfrage = "SELECT * FROM  user_daten WHERE usr_mail LIKE '$fmail' ";
$ergebnis = mysql_query($abfrage);
$daten = mysql_fetch_array($ergebnis);
echo $daten["usr_mail"]; 
$dbmail=$daten["usr_mail"];
$dbpw=$daten["usr_pw"];
$dbsalt=$daten["usr_salt"];

echo $abfrage; 

/*Verschlüssele das Passwort mit md5*/
$fpw=$dbsalt.$fpw.$pepper;
$fpw=md5($fpw);
echo $fpw;

/* Vergleiche die Passwörter miteinander*/
If ($dbpw==$fpw)
{echo "JUHU!";
/*Lege die Session-Variablen fest: */
	
$_SESSION["mail"]= $dbmail;
$_SESSION["pw"]= $dbpw;
$_SESSION["id"] = $daten["usr_index"];
$_SESSION["status"] = $daten["usr_first_login"];
$uid=$_SESSION["id"];

//echo "alles korrekt!";

/* Leite weiter auf die Main-Page:*/ 

echo "<html>\n";
echo "<head>\n";
echo "<script type=\"text/javascript\">\n";
echo "window.setTimeout('open(\"http://www.aron.games/main.php\", \"_self\")', 3);\n";
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
//echo "<a href=\"http://www.aron.games/main.php\"> Sollte der automatische Link nicht funktionieren, benutzen Sie bitte den hier </a>\n";
echo "</td>\n";
echo "</tr>\n";
echo "</table> \n";

echo "</body>\n";
echo "</html>\n"; 

}
else
{echo "Leider waren deine Angaben nicht korrekt. <br>";
echo $_POST["Mailadresse"]." ".$_POST["Password"];
//echo "<a href=\"http://www.aron.games/logout.php?".session_name()."\"> Session löschen</a>\n";

}



?>