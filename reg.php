<?php 
/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'includes/dbconnect.inc.php';
//Binde das Pepper ein...
include_once 'includes/area51.inc.php';

//Wurde eine formell gültige Mailadresse eingegeben? 
//Übergabe der Formularfelder an "normale" Variablen. 

$Name=$_POST["Username"];
$PW=$_POST["Password"];
$PW_best=$_POST["Password2"];
$Mail=$_POST["Mailadresse"];
$Mail_best=$_POST["Mailadresse2"];
$Fehler=0;

If(!isset($_POST["Password"]))
{
echo "Bitte gib ein Passwort ein!";
$Fehler=1;

}

If(!isset($_POST["Mailadresse"]))
{
echo "Bitte gib eine gültige Mailadresse ein!";
$Fehler=1;
}

If ($Mail!=$Mail_best)
{
echo "Die eingegebenen Mailadressen stimmen nicht überein";
$Fehler=1;
}

If ($PW!=$PW_best)
{
echo "Die eingegebenen Passwörter stimmen nicht überein";
$Fehler=1;
}

//Datenbank nach Usernamen durchsuchen
$Sqlab = "SELECT * FROM `user_daten` WHERE `usr_name` LIKE '$Name'"; 
$result = mysql_query( $Sqlab);
$res=mysql_query($Sqlab);
$numname= mysql_num_rows($res);

if ($numname>0)
{
	echo "Dieser Username wird bereits benutzt."; 
}


//Datenbank nach Mailadresse durchsuchen
$Sqlab = "SELECT * FROM `user_daten` WHERE `usr_mail` LIKE '$Mail'"; 
$result = mysql_query( $Sqlab);
$res=mysql_query($Sqlab);
//$Daten=mysql_fetch_object($result);
//echo $Sqlab;
$num= mysql_num_rows($res);

If ($num> 0)
{
echo "Diese Mailadresse wird bereits verwendet.";

}

else 
	
If(isset($_POST["Password"])
&&
isset($_POST["Password2"])
&&
isset($_POST["Mailadresse"])
&&
isset($_POST["Mailadresse2"])
&& $Fehler==0
)
{

//Die Daten werden in die Datenbank eingetragen

//Verschlüssel das PW nach md5:
$salt= rand(1,5000000);
$PW=$salt.$PW.$pepper;
$PW=md5($PW);
//eintragen in die DB
//echo "Ich trage ein: ";


$Sqlab="INSERT INTO `user_daten`(`usr_name`,`usr_mail`, `usr_pw`,`usr_salt`) VALUES ('$Name','$Mail','$PW','$salt')";
$eintragen = mysql_query($Sqlab);
//echo $Sqlab;

//Verifizierungsmail senden:

//Datenbank nachMailadresse durchsuchen, USERID RAUSSUCHEN
$Sqlab2 = "SELECT * FROM `user_daten` WHERE `usr_mail` LIKE '$Mail'";
$ergebnis=mysql_query($Sqlab2);
$Daten1=mysql_fetch_array($ergebnis);
$uid=$Daten1["usr_index"];

$empfaenger = $Mail;
$betreff = "Aktivierungslink A.R.O.N.";
$text = "Hallo, 
Vielen Dank für deine Registrierung bei aron.games. 
Um deinen Account zu aktivieren, klicke bitte auf folgenden Link: 
http://www.aron.games/main.php?section=validateEmail&uid=".$uid.
" Deine Zugangsdaten lauten: 

Name: ".$Mail."
Passwort:".$PW_best."
Viel Spaß beim Spielen wünscht dir dein 

A.R.O.N.-Team

";
$sender="aron.games";
$sendermail="info@aron.games";
mail($empfaenger, $betreff, $text,
"From: $sender <$sendermail>");

echo "An Deine Mailadresse ".$Mail." wurde eine Mail zur Freischaltung Deines Accounts gesendet.";

}

?>
