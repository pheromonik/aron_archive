<?php
echo "Nachrichtenbereich"; 
//Frage: sind Nachrichten vorhanden? 
include 'includes/dbconnect.inc.php';
$uid=$_SESSION["id"];
$abfrage = "SELECT * FROM  message WHERE empf_id = '$uid' ";
$daten = mysql_fetch_array($ergebnis);

if (isset($_GET["action"]))
{
//WEM GEHÖRT DIE PN? 
$abfrage = "SELECT * FROM  message WHERE empf_id='$uid' AND pn_id='$pnid'";
if ($num_rows<1)
{
}
else
{

$daten = mysql_fetch_array($ergebnis);
$sql = "DELETE FROM `message` WHERE `message`.`pn_id` = $pnid";
 echo $loeschen; 
}

}

}
//Wenn keine Nachrichten vorhanden sind: 
If(empty($daten["empf_id"]))
else
//Wenn Nachrichten vorhanden sind: 
{
echo "<table class='standartschrift'>
<tr>
<td> Status</td> <td>Absender</td><td>Betreff</td> <td>Datum</td></tr>";
$abfrage = "SELECT * FROM  message WHERE empf_id='$uid' AND eing='1' ORDER BY pn_id DESC";
/* gib alle PMs aus */
$num_rows = mysql_num_rows($ergebnis);
//echo $num_rows;
echo "<a href=\"http://www.aron.games/message.php?section=pneu\"> Neue Nachricht verfassen</a>";
/* Gib alle Pms aus: */
while($row = mysql_fetch_object($ergebnis))
    {
$absuid=$row->abs_id; 
$abfrage2 = "SELECT * FROM  user_daten WHERE usr_index='$absuid'";
 //Jahr
$jahr= substr($z,0,4);
$monat=substr($z,5,2); 
if ($monat<10)
{$monat=substr($monat,1,1);}
//Tag. Wenn unter 10, dann m u s s  die Angabe einstellig sein: 
$tag=substr($z,8,2);
 if ($tag<10)
{$tag=substr($tag,1,1);}

/*Stunde. Wenn unter 10, dann m u s s  die Angabe einstellig sein, wenn über 12,
  dann muss die Angabe einstellig gemacht werden. */
$stunde= substr($z,11,2);
if ($stunde<10)
{$stunde=substr($stunde,1,1);}
If ($stunde>12)
{$stunde=$stunde-12;}
//Minute: Wenn unter 10, dann m u s s  die Angabe einstellig sein
$minute=substr($z,14,2);
if ($minute<10)
//Sekunde: Wenn unter 10, dann m u s s  die Angabe einstellig sein
 $sekunde=substr($z,17,2);
if ($sekunde<10)
{$sekunde=substr($sekunde,1,1);}
$ZZ =mktime($stunde,$minute,$sekunde,$monat,$tag,$jahr);
//Lösche zu alte PMS: 
//Ist die PM älter als fünf Tage? 

$timeneu= $ZZ+432000;
$timeaktuell= time();

if ($timeaktuell>$timeneu)
{
$pnid=$row->pn_id;
    $loeschen = "DELETE FROM post WHERE pn_id='$pnid'";
} 
else
{
{
}
else if ($row->status==1)
{
$status=">>GELESEN<<";
}
echo "<tr><td>"
.$status.
"</td><td><a href=\"http://www.aron.games/main.php?section=profil&userid=".$absuid."\">"
.$abs.
"</a></td><td><a href=\"http://www.aron.games/message.php?section=lesen&pnid="
.$row->pn_id.
"\">"
.$row->titel.
"</a></td><td>"
.$zeit."
</td><td>
<a href=\"message.php?section=eingang&action=delete&pnid="
.$row->pn_id.
"\">>>DELETE<<</a></td></tr>";
}

}


echo "</table>";

}

?>