<?php


$uid=$_SESSION["id"];
$abfrage = "SELECT * FROM  `char`  WHERE `u_id`='$uid'";
$ergebnis = mysql_query($abfrage);
$daten = mysql_fetch_array($ergebnis);

//Level Krieger: 

$klvl=$daten["Klvl"]+1;
$kxp=$daten["KExP"];

$abfrage = "SELECT * FROM  `level`  WHERE `lvl`='$klvl'";
$ergebnis = mysql_query($abfrage);
$datenl = mysql_fetch_array($ergebnis);

if ($datenl["xp"]<=$kxp)
{
echo "Levelup! Du steigst als Krieger eine Stufe auf!";
//Setze das neue Level 


$aendern = "UPDATE `char` SET `Klvl`= '$klvl' WHERE u_id = '$uid'";
$update = mysql_query($aendern);

}


//Levelup Dieb

$dlvl=$daten["Dlvl"]+1;
$dxp=$daten["DExP"];

$abfrage = "SELECT * FROM  `level`  WHERE `lvl`='$dlvl'";
$ergebnis = mysql_query($abfrage);
$datenl = mysql_fetch_array($ergebnis);

if ($datenl["xp"]<=$dxp)
{
echo "Levelup! Du steigst als Dieb eine Stufe auf!";
//Setze das neue Level 


$aendern = "UPDATE `char` SET `Dlvl`= '$dlvl' WHERE u_id = '$uid'";
$update = mysql_query($aendern);

}


//Magier


$mlvl=$daten["Mlvl"]+1;
$mxp=$daten["MExP"];

$abfrage = "SELECT * FROM  `level`  WHERE `lvl`='$mlvl'";
$ergebnis = mysql_query($abfrage);
$datenl = mysql_fetch_array($ergebnis);

if ($datenl["xp"]<=$mxp)
{
echo "Levelup! Du steigst als Magier eine Stufe auf!";
//Setze das neue Level 


$aendern = "UPDATE `char` SET `Mlvl`= '$mlvl' WHERE u_id = '$uid'";
$update = mysql_query($aendern);

}



//Priester


$plvl=$daten["Plvl"]+1;
$pxp=$daten["PExP"];

$abfrage = "SELECT * FROM  `level`  WHERE `lvl`='$plvl'";
$ergebnis = mysql_query($abfrage);
$datenl = mysql_fetch_array($ergebnis);

if ($datenl["xp"]<=$pxp)
{
echo "Levelup! Du steigst als Priester eine Stufe auf!";
//Setze das neue Level 


$aendern = "UPDATE `char` SET `Plvl`= '$plvl' WHERE u_id = '$uid'";
$update = mysql_query($aendern);

}

?>