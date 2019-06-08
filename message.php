<?php
session_start();

/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'includes/dbconnect.inc.php';


/*if (empty($_SESSION["name"])||$_SESSION["aktiv"]>0)
{


if ($_SESSION["aktiv"]==1)
{ $_SESSION["Sperrgrund"]="Dein Account wurde noch nicht freigeschaltet.";}
if ($_SESSION["aktiv"]==2)
{$_SESSION["Sperrgrund"]="Dein Account ist zur Zeit gesperrt.";}


echo "No entrance";
//echo "<script type=\"text/javascript\">\n";
//echo "window.setTimeout('open(\"http://www.risinghell.de/index.php\", \"_self\")', 0.10);\n";
//echo "</script>\n";
}
else
{
/* Hier werden die einzelnen Sections angegeben: Hütchenspiel, chat.. */

$section = array();
$section['post'] = 'post/post.php';
$section['eingang'] = 'post/eingang.php';
$section['pneu'] = 'post/pneu.php';
$section['ausgang'] = 'post/ausgang.php';
$section['eintragen'] = 'post/eintragen.php';
$section['lesen'] = 'post/lesen.php';
$section['eigenelesen'] = 'post/eigenepnlesen.php';
$section['reply'] = 'post/reply.php';


include 'header.html'; // doctype, <html> und das komplette <head>-element
echo "   <body id=\"corpus\">
<div id=\"wrapper\" class=\"transparent\"><!-- umschliesst alles -->

<div id=\"header\">

		<div id=\"logo\"><!-- optional -->

		</div><!-- logo -->
	</div><!-- header -->


<div id=\"content\"><a name=\"content\" class=\"invis\"> </a>


";

/*Das globale Menü wird gleaden*/

include 'includes/globalmenu.inc.php';



//Das Menü wird geladen 

//include 'postmenu.php';

echo "<div id=\"contenta\">";

/*Hier wird abgefragt: 
1. ist die Section im Array vorhanden, die angesprochen wurde
2. wurde eine Section angesprochen oder ist das "leer"? 
Wenn keine Section angegeben wird, dann soll die Section post geladen werden. 
*/

if (isset($_GET['section'], $section[$_GET['section']])) {
    include $section[$_GET['section']];
} else {
    include $section['eingang'];
}
echo "    
</div><!-- contenta -->
</div><!-- content -->
 </div><!-- wrapper-->"; 
 
 
include 'chat.php';
echo "<div id=\"footer\">\n";
include 'footer.html';
echo "</div></body>";



echo "</html>\n";
//}
?>

