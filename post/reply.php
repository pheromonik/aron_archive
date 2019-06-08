<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//Datenbankverbindung wird aufgebaut
//include 'includes/dbconnect.php';

//HTML HEADER laden 
include 'header.html';
$reempfid=$_GET["empfuid"];
$betreff=$_GET["betreff"];

$abfrage = "SELECT * FROM  user_daten WHERE usr_index='$reempfid'";
$ergebnis = mysql_query($abfrage);
$datenu = mysql_fetch_array($ergebnis);
$reempf = $datenu["usr_name"];






//erste Antwort: 

If(substr($betreff,0,1)!="[" && substr($betreff,3,3)!="Re:")
{
$betreffneu="Re:".$betreff;
}

//zweite Antwort:
else if(substr($betreff,0,3)=="Re:")
{
$i=2;

$betreffneu="Re[".$i."]".substr($betreff,3);
}



//mehrere Antworten: 
if(substr($betreff,0,3)=="Re[")
{
//im einstelligen Bereich: 

if (substr($betreff,4,1)=="]")
{$i=substr($betreff,3,1);
$i=$i+1;
$betreffneu="Re[".$i."]".substr($betreff,5);}

//im zweistelligen Bereich: 

else if(substr($betreff,5,1)=="]")
{$i=substr($betreff,3,2);
$i=$i+1;
$betreffneu="Re[".$i."]".substr($betreff,6);}

//im dreistelligen Bereich: 

else if(substr($betreff,6,1)=="]")
{$i=substr($betreff,3,3);
$i=$i+1;
$betreffneu="Re[".$i."]".substr($betreff,7);}

//im viertstelligen Bereich: 

else if(substr($betreff,7,1)=="]")
{$i=substr($betreff,3,4);
$i=$i+1;
$betreffneu="Re[".$i."]".substr($betreff,8);}

//im fünfstelligen Bereich: 
else if(substr($betreff,8,1)=="]")
{$i=substr($betreff,3,5);
$i=$i+1;
if ($i==99999){$i=1;}
$betreffneu="Re[".$i."]".substr($betreff,9);}

}







//Anzeige des Antwortformulars 

echo "<form action=\"/message.php?section=eintragen\" method=\"POST\"  name=\"myForm\" onsubmit=\"return validate();\">

    <fieldset>
        <legend>Antwort:</legend>
<table>
<tr>
<td>
        <label>Empfänger  <input type=\"text\" name=\"empfang\"  value=\"".$reempf."\"/></label></td></tr>
<tr>
<td>
        <label>Betreff: <input type=\"text\" name=\"betreff\" maxlength=\"50\"  value=\"".$betreffneu."\"/></br></label></td></tr>


<tr>
<td>
        <label><textarea cols=\"80\" rows=\"15\" name=\"text\" maxlength=\"5000\"/></textarea></br></label></td></tr>
     
  <tr>
<td>      <input type=\"submit\" name=\"formaction\" value=\"absenden\" /></td></tr></table>
    </fieldset>
</form> ";


?>
