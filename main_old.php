<?php
/* Session starten oder wieder aufnehmen*/
session_start(); 

/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'includes/dbconnect.inc.php';

if (empty($_SESSION["aktiv"]))
{
$_SESSION["aktiv"]=0;
}

if (empty($_SESSION["mail"])||$_SESSION["aktiv"]>0)
{
if ($_SESSION["aktiv"]==1)
{
$_SESSION["Sperrgrund"]="Dein Account wurde noch nicht freigeschaltet.";
echo "Der Account ist noch nicht aktiv"; 
}


if ($_SESSION["aktiv"]==2)
{
$_SESSION["Sperrgrund"]="Dein Account ist zur Zeit gesperrt.";
}

/*
echo "No entrance";
echo "<script type=\"text/javascript\">\n";
echo "window.setTimeout('open(\"http://www.weltenwanderer.name/index.php\", \"_self\")', 0.10);\n";
echo "</script>\n";*/



}
else
{


//erneuere die Session-Daten!
$uid=$_SESSION["id"];
$abfrage = "SELECT * FROM  user_daten WHERE usr_index='$uid' ";
$ergebnis = mysql_query($abfrage);
$daten = mysql_fetch_array($ergebnis);


$_SESSION["mail"]= $daten["usr_mail"];
$_SESSION["aktiv"]=$daten["usr_aktiv"];





/* Hier werden die einzelnen Sections angegeben: vorerst charaktererstelllung*/

$section = array();
$section['charakter'] = 'charakter.php';


//der HTML-Header wird geladen

include 'header.html'; // doctype, <html> und das komplette <head>-element

echo " 

<body id=\"corpus\">

<div id=\"wrapper\" class=\"transparent\"><!-- umschliesst alles -->
<div id=\"header\">

		<div id=\"logo\"><!-- optional -->
<h1>

</h1>
		</div><!-- logo -->
	</div><!-- header -->




<div id=\"content\"><a name=\"content\" class=\"invis\"> </a>
  ";


/*Das globale Menü wird gleaden*/
/*include 'globalmenu.inc.php';

//Das Menü wird geladen 
include 'innermenu.php';*/



echo "<div id=\"contenta\">";

/*Hier wird abgefragt: 
1. ist die Section im Array vorhanden, die angesprochen wurde
2. wurde eine Section angesprochen oder ist das "leer"? 
Wenn keine Section angegeben wird, dann soll die Section city geladen werden. 
*/

if (isset($_GET['section'], $section[$_GET['section']])) {
    include $section[$_GET['section']];
} else {
   include $section['charakter'];
}


echo "
</div><!-- contenta -->
</div><!-- content -->
</div><!-- wrapper--> ";

include 'chat.php';

echo "</body>
<div id=\"footer\">\n";

include 'footer.html';

echo "</div></html>\n";
 }
?>
