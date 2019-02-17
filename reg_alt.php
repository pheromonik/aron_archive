<?php                                                                      
/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'includes/dbconnect.inc.php';
include 'header.html';



//Wurde eine formell gültige Mailadresse eingegeben? 
//Übergabe der Formularfelder an "normale" Variablen. 

echo $_POST["Password"];
echo $_POST["Mailadresse"];


$PW=$_POST["Password"];
$PW_best=$_POST["Password2"];
$Mail=$_POST["Mailadresse"];
$Mail_best=$_POST["Mailadresse2"];

$num= 0;


// Wurden alle Felder ausgefüllt? 

If(!isset($_POST["Password"]))
{
echo "Bitte gib ein Passwort ein!";

}

If(!isset($_POST["Mailadresse"]))
{
echo "Bitte gib eine gültige Mailadresse ein!";

}

If ($Mail!=$Mail_best)
{
	echo "Die eingegebenen Mailadressen stimmen nicht überein";
}

If ($PW!=$PW_best)
{
	echo "Die eingegebenen Passwörter stimmen nicht überein";
}


//Datenbank nach Mailadresse durchsuchen
$Sqlab = "SELECT *  FROM `user_daten` WHERE `usr_mail` LIKE  '$Mail'"; 

$result  =  mysql_query( $Sqlab);
$res=mysql_query($Sqlab);
//$Daten=mysql_fetch_object($result);
$num= mysql_num_rows($res);


If ($num> 0)
{
echo "Diese Mailadresse wird bereits verwendet.";

}

else If(isset($_POST["Password"])
&&
isset($_POST["Password2"])
&&
isset($_POST["Mailadresse"]))
&&
isset($_POST["Mailadresse2"]))
{

//Die Daten werden in die Datenbank eingetragen

$PW=$_POST["Password"];
$Mail=$_POST["Email"];

//Verschlüssel das PW nach md5:

$PW=md5($PW);
//md5-VErschlüsselung
$Sqlab="INSERT INTO `user_daten`(`usr_mail`, `usr_pw`)  VALUES ('$Mail','$PW')";
$eintragen = mysql_query($Sqlab);


//Verifizierungsmail senden:
  
//Datenbank nachMailadresse durchsuchen, USERID RAUSSUCHEN
$Sqlab2 = "SELECT *  FROM `user_daten` WHERE `usr_mail` LIKE  '$Mail'";
$ergebnis=mysql_query($Sqlab2);
$Daten1=mysql_fetch_array($ergebnis);
$uid=$Daten1["usr_index"];



  $empfaenger = $Mail;
  $betreff = "Aktivierungslink A.R.O.N.";
  $text = "Hallo, <br>
           Vielen Dank für deine Registrierung bei aron.games. 
	   Um deinen Account zu aktivieren, klicke bitte auf folgenden Link: 
http://www.aron.games/main.php?section=validateEmail&uid=".$uid.
"
Deine Zugangsdaten lauten: 

Name: ".$Mailadresse."
Passwort:".$PW_best."
Viel Spaß beim Spielen wünscht dir dein 

A.R.O.N.-Team


";
$sender="aron.games";
$sendermail="info@aron.games";
  mail($empfaenger, $betreff, $text,
       "From: $sender <$sendermail>");





echo "Die Daten wurden eingetragen. </br> 
An Deine Mailadresse ".$Mail." wurde eine Mail zur Freischaltung Deines Accounts gesendet.";

}

?>