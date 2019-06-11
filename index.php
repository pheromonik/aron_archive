<?php
/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);



/* Hier werden die einzelnen Sections angegeben*/

$section = array();
$section['news'] = 'news.php';
$section['register'] = 'register.php';
$section['reg'] = 'reg.php';
$section['login'] = 'login.php';
$section['validateEmail'] = 'validate.php';
$section['impressum'] ='impressum.php';
$section['FAQ'] ='FAQ.php';
$section['regeln'] ='regeln.php';
$section['AGB'] ='AGB.php';
$section['team'] ='team.html';
//der HTML-Header wird geladen

include 'header.html'; // doctype, <html> und das komplette <head>-element
 echo "    <body id=\"corpus\">

<div id=\"wrapper3\" class=\"transparent\"><!-- umschliesst alles -->

<div id=\"header\">

		<div id=\"logo\"><!-- optional -->
<h1> 
</h1>
		</div><!-- logo -->
	</div><!-- header -->";

echo "

<div id=\"content\"><a name=\"content\" class=\"invis\"> </a>";

//Das Menü wird geladen 

include "indexmenu.php";

/*Hier wird abgefragt: 
1. ist die Section im Array vorhanden, die angesprochen wurde
2. wurde eine Section angesprochen oder ist das "leer"? 
Wenn keine Section angegeben wird, dann soll die Section News geladen werden. 
*/

if (isset($_GET['section'], $section[$_GET['section']])) {
    include $section[$_GET['section']];
} else {
    include $section['news'];
}
echo "    

</div><!-- content -->
 </div><!-- wrapper3-->";
include 'footer.html';
echo " </body>\n";
echo "</html>\n";
?>
