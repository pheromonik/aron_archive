<?php
/* Session starten oder wieder aufnehmen*/
session_start(); 

/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'dbconnect.inc.php';


/*if (empty($_SESSION["name"])||$_SESSION["aktiv"]>0||$_SESSION["team"]==0)
{

/*
if ($_SESSION["aktiv"]==1)
{ $_SESSION["Sperrgrund"]="Dein Account wurde noch nicht freigeschaltet.";}
if ($_SESSION["aktiv"]==2)
{$_SESSION["Sperrgrund"]="Dein Account ist zur Zeit gesperrt.";}
*/

/* echo "No entrance";
echo "<script type=\"text/javascript\">\n";
echo "window.setTimeout('open(\"http://aron.games/logout.php", \"_self\")', 0.10);\n";
echo "</script>\n";
}
else
{
	*/
	
	
$sid=$_SESSION["id"];
$abfrage = "SELECT * FROM  user_daten WHERE usr_index='$sid' ";
$ergebnis = mysql_query($abfrage);

$daten = mysql_fetch_array($ergebnis);
$status=$daten["usr_save"];

if ($status < 1)

{
/*echo "No entrance";

echo "<script type=\"text/javascript\">\n";
echo "window.setTimeout('open(\"http://www.aron.games/logout.php\", \"_self\")', 10);\n";
echo "</script>\n";*/
echo $status;
}
else
{



/* Hier werden die einzelnen Sections angegeben: vorerst tavern*/

$section = array();
$section['uebersicht'] = 'uebersicht.inc.php';
$section['team'] = 'team.php';
$section['play'] = 'play.php';
$section['eintragen'] = 'eintragen.php';
$section['tickets']='tickets.php';
$section['tlesen']='tlesen.php';
$section['reply']='reply.php';
$section['main']='main.php';
$section['pns']='meldpns.php';
$section['editchat']='bearbeitenchat.php';
$section['sstufen']='sstufen.php';
//der HTML-Header wird geladen

include 'header.html'; // doctype, <html> und das komplette <head>-element
echo "    <body id=\"corpus\">
<div id=\"wrapper\"><!-- umschliesst alles -->

<div id=\"header\">

		<div id=\"logo\"><!-- optional -->

		</div><!-- logo -->
	</div><!-- header -->";



//Das Menü wird geladen 

//include 'adminmenu.php';

echo "
<div id=\"content\"><a name=\"content\" class=\"invis\"> </a>";


/*Hier wird abgefragt: 
1. ist die Section im Array vorhanden, die angesprochen wurde
2. wurde eine Section angesprochen oder ist das "leer"? 
Wenn keine Section angegeben wird, dann soll die Section city geladen werden. 
*/

if (isset($_GET['section'], $section[$_GET['section']])) {
    include $section[$_GET['section']];
} else {
    include $section['uebersicht'];
}
echo "    
</div><!-- content -->
 </div><!-- wrapper--> </body>\n";
echo "    </body>\n";
include 'footer.html';

echo "</html>\n";
 }

?>
