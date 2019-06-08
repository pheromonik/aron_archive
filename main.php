<?php
session_destroy();
/* Session starten oder wieder aufnehmen*/
session_start(); 

/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*Öffnen der DB*/
include 'includes/dbconnect.inc.php';

/*Übergabe der Session-Variablen */ 

$uid=$_SESSION["id"];

echo $uid;
/* Hier werden die einzelnen Sections der Mainpage angegeben*/


$section = array();
$section['hangar'] = 'hangar.php';
$section['bank'] = 'bank.php';
$section['reg'] = 'reg.php';
$section['charcrea'] = 'characreation.php';
$section['validateEmail'] = 'validate.php';
$section['shop'] ='shop.php';
$section['info'] ='info.php';
$section['ship'] ='ship.php';
$section['message']='message.php';

/*Hier wird abgefragt: 
1. ist die Section im Array vorhanden, die angesprochen wurde
2. wurde eine Section angesprochen oder ist das "leer"? 

Wenn keine Section angegeben wird, dann soll die Section Hangar geladen werden. 

Ausnahme: es wurde bisher noch kein Charakter erstellt. 

Abfrage: ist in der DB ein Charakter zu diesem User gehörig gespeichert? */

$sql = "SELECT * FROM `char_daten` WHERE `user_id`= $uid";
$res= mysql_query($sql);
$num= mysql_num_rows($res);

//echo "Es sind ".$num." Datensätze vorhanden."; 

//Wenn ja, dann: 
if ($num>0)
{
if (isset($_GET['section'], $section[$_GET['section']])) 
{
    include 'header.html'; 

echo "<body id=\"inplay\">";
echo "<main>";
    include $section[$_GET['section']];
} else 
{

/*Übernahme des Designs*/
include 'header.html'; 

echo "<body id=\"inplay\">";
echo "<main>";
    include $section['hangar'];
}
}
//wenn nein, dann: 
else if ($num==0)
{
    echo "Charaktererstellung..."; 
include $section['charcrea'];
}



echo "</main>";
echo "</body>";

/*Übernahme des footer*/
include 'footer.html'; 
?>
