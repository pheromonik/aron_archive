<?php                                                                      
/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'includes/dbconnect.inc.php';
include 'header.html';



//Wurde eine formell g�ltige Mailadresse eingegeben? 
//�bergabe der Formularfelder an "normale" Variablen. 

$Name=$_POST["Username"];
$PW=$_POST["Password"];
$PW_best=$_POST["Password2"];
$Mail=$_POST["Email"];
$num= 0;


// Wurden alle Felder ausgef�llt? 

If(!isset($_POST["Username"]))
{
echo "Bitte gib einen Usernamen ein!";
}

If(!isset($_POST["Password"]))
{
echo "Bitte gib ein Passwort ein!";

}


If(!isset($_POST["Email"]))
{
echo "Bitte gib eine g�ltige Mailadresse ein!";

}



//Datenbank nach Username durchsuchen
$Sqlab = "SELECT *  FROM `user_daten` WHERE `usr_name` LIKE  '$Name'"; 

$result  =  mysql_query( $Sqlab);
$res=mysql_query($Sqlab);
//$Daten=mysql_fetch_object($result);
$num= mysql_num_rows($res);

/* Ermitteln, ob der Benutzername bereits einer id zugeordnet (also vorhanden) ist. */



$PW=$_POST["Password"];
$PW_best=$_POST["Password2"];
$Mail=$_POST["Email"];


If ($num> 0)
{
echo "Dieser Benutzername ist bereits vorhanden.";

}

else If(isset($_POST["Username"])
&&
isset($_POST["Password"])
&&
isset($_POST["Password2"])
&&
isset($_POST["Email"]))
{

//Die Daten werden in die Datenbank eingetragen

//ERST DIE USERDATEN!!




$Name=$_POST["Username"];
$PW=$_POST["Password"];
$PW_best=$_POST["Password2"];
$Mail=$_POST["Email"];

//Verschl�ssel das PW nach md5:

$PW=md5($PW);
//md5-VErschl�sselung
$Sqlab="INSERT INTO `db186687x1941523`.`user_daten`(`usr_name`, `usr_mailadresse`, `usr_passwort`)  VALUES ('$Name','$Mail','$PW')";
$eintragen = mysql_query($Sqlab);


//Verifizierungsmail senden:
  
//Datenbank nach Username durchsuchen - USERID RAUSSUCHEN
$Sqlab2 = "SELECT *  FROM `user_daten` WHERE `usr_name` LIKE  '$Name'";
$ergebnis=mysql_query($Sqlab2);
$Daten1=mysql_fetch_array($ergebnis);
$uid=$Daten1["usr_index"];



  $empfaenger = $Mail;
  $betreff = "Aktivierungslink Weltenwanderer";
  $text = "Seid gegr��t, ".$Name."!
           Vielen Dank f�r deine Registrierung bei Weltenwanderer.name. 
	   Um deinen Account zu aktivieren, klicke bitte auf folgenden Link: 
http://www.weltenwanderer.name/index.php?section=validateEmail&uid=".$uid.
"
Deine Zugangsdaten lauten: 

Name: ".$Name."
Passwort:".$PW_best."
Viel Spa� beim Spielen w�nscht dir dein 

Weltenwanderer-Team


";
$sender="weltenwanderer.name";
$sendermail="info@weltenwanderer.name";
  mail($empfaenger, $betreff, $text,
       "From: $sender <$sendermail>");





echo "Die Daten wurden eingetragen. </br> 
An Deine Mailadresse ".$Mail." wurde eine Mail zur Freischaltung Deines Accounts gesendet.";
//CHARDATEN EINTRAGEN


/*
Die Rasse ist wie folgt angegeben: 
1= Mensch = keine Abz�ge, keine Boni
*************************************
2= Elf
- Geschicklichkeit +2
- Charisma +1
- St�rke -1
- Gesundheit -2
Elfen sind gewandt und charismatisch, 
haben aber eine fragilere Konstitution und sind nicht ganz so stark wie andere
 Rassen.
 ************************************
3= Zwerg
- Gesundheit +2
- Weisheit +1
- Intelligenz -1
- Geschicklichkeit -1
- Charisma -1
Zwerge sind brummelig, trinkfest und haben eine bodenst�ndige Lebensansicht. Sie
 sind aber nicht die Geschicktesten und weder geistige Reglichkeit, noch 
 ausgepr�gtes Charisma z�hlen zu ihren St�rken.
 ************************************
4= Ork
- St�rke +1
- Gesundheit +1
- Intelligenz -2
- Charisma -1
Orkse sind stark und - auch weil sie ihre eigenen Spezialit�ten �berleben m�ssen
 - hart im Nehmen. Sie sind aber weder besonders sch�n noch besonders 
 intelligent.
************************************
5= Dunkelelf
- Geschicklichkeit +2
- Charisma -2
- Weisheit -1
Dunkelelfen leben in einer gewaltt�tigen Gesellschaft und feindseligen Umgebung,
was ihre Interaktionsf�higkeit deutlich senkt. Auch haben sie oft weniger 
Lebenserfahrung als andere. Sie sind genauso geschickt wie Elfen, aber etwas 
st�rker und aufgrund ihrer Lebensumst�nde weit h�rter im Nehmen.
************************************
6= Halbling
- Geschicklichkeit +2
- St�rke -2
- Weisheit -1
- Gesundheit +1
Die sympathischen Halblinge sind schnell, aber nicht stark. Daf�r wachsen sie 
in gesunder Umgebung auf. Es fehlt ihnen manchmal die n�tige Zur�ckhaltung und 
ihr Selbsterhaltungstrieb ist schw�cher als der anderer Rassen.
************************************
7= Troll
- St�rke +3
- Geschicklichkeit -2
- Gesundheit +2
- Intelligenz -1
- Weisheit -2
- Charisma -2
Gro�, langsam und unglaublich stark und robust, Trolle sind furcherregend - 
weshalb sie auch kaum einer mag. Sie reagieren auf Ablehnung mit Gewalt, was 
nicht immer gesund f�r sie ist.
************************************
8= Fee
- St�rke -6
- Geschicklichkeit +4
- Gesundheit -2
- Intelligenz +2
- Weisheit -2
- Charisma +4
Kleine wendige und hochintelligente Feen sind spa�ige Gef�hrten - k�nnen aber 
auch ganz sch�n b�sartig sein. Ihre Schw�chen sind die K�rperkraft, die 
Gesundheit und nicht zuletzt ein gewisser Leichtsinn...

*/

$skill = array();
$skill["stark"]= 9;
$skill["geschick"]=9;
$skill["weiheit"]=9;
$skill["gesundheit"]=9;
$skill["intelligenz"]=9;
$skill["charisma"]=9;

switch($_POST["rasse"])
{
case 1:
//"Mensch";
$skill["stark"]= 9;
$skill["geschick"]=9;
$skill["weiheit"]=9;
$skill["gesundheit"]=9;
$skill["intelligenz"]=9;
$skill["charisma"]=9;
break;
case 2: 
/*"Elf";          
- Geschicklichkeit +2
- Charisma +1
- St�rke -1
- Gesundheit -2
*/
$skill["stark"]= 8;
$skill["geschick"]=11;
$skill["weiheit"]=9;
$skill["gesundheit"]=7;
$skill["intelligenz"]=9;
$skill["charisma"]=10;
break;
case 3:
/*"Zwerge"
- Gesundheit +2
- Weisheit +1
- Intelligenz -1
- Geschicklichkeit -1
- Charisma -1   */

$skill["stark"]= 9;
$skill["geschick"]=8;
$skill["weiheit"]=10;
$skill["gesundheit"]=11;
$skill["intelligenz"]=8;
$skill["charisma"]=8;
break;
case 4:
/*Orkse:
- St�rke +1
- Gesundheit +1
- Intelligenz -2
- Charisma -1
*/
$skill["stark"]= 10;
$skill["geschick"]=9;
$skill["weiheit"]=9;
$skill["gesundheit"]=10;
$skill["intelligenz"]=7;
$skill["charisma"]=8;
break;
case 5:
/*Dunkelelfen:
- Geschicklichkeit +2
- Charisma -2
- Weisheit -1
*/
$skill["stark"]= 9;
$skill["geschick"]=11;
$skill["weiheit"]=8;
$skill["gesundheit"]=9;
$skill["intelligenz"]=9;
$skill["charisma"]=7;
break;
case 6:
/* Halblinge 
- Geschicklichkeit +2
- St�rke -2
- Weisheit -1
- Gesundheit +1*/
$skill["stark"]= 7;
$skill["geschick"]=11;
$skill["weiheit"]=8;
$skill["gesundheit"]=10;
$skill["intelligenz"]=9;
$skill["charisma"]=9;
break;
case 7:
/* Trolle
- St�rke +3
- Geschicklichkeit -2
- Gesundheit +2
- Intelligenz -1
- Weisheit -2
- Charisma -2*/
$skill["stark"]= 12;
$skill["geschick"]=7;
$skill["weiheit"]=9;
$skill["gesundheit"]=11;
$skill["intelligenz"]=8;
$skill["charisma"]=7;
break;
case 8:
/*Feen 
- St�rke -6
- Geschicklichkeit +4
- Gesundheit -2
- Intelligenz +2
- Weisheit -2
- Charisma +4*/
$skill["stark"]= 3;
$skill["geschick"]=13;
$skill["weiheit"]=9;
$skill["gesundheit"]=9;
$skill["intelligenz"]=11;
$skill["charisma"]=13;
break;
}
/* Die Rassenwerte werden entsprechend in die DB eingetragen, dabei wird eine 
charid generiert.*/
$stark= $skill["stark"];
$geschick=$skill["geschick"];
$gesundheit=$skill["gesundheit"];
$weisheit= $skill["weiheit"];
$intelligenz=$skill["intelligenz"];
$charisma= $skill["charisma"];
$gender=$_POST["gender"];
$rasse=$_POST["rasse"];

//Userid muss abgefragt werden: 


$Sqlab = "INSERT INTO 
`char` 
(`u_id`,`rasse`,`gender`,`kraft`,`geschick`,`intelligenz`,`weisheit`,`gesundheit`,`charisma`) 
VALUES 
('$uid','$rasse','$gender', '$stark','$geschick','$intelligenz', '$weisheit', '$gesundheit', '$charisma')";
$eintragen = mysql_query($Sqlab);


/* Der Charstatus wird auf 1 gesetzt: */
 $aendern = "UPDATE user_daten Set usr_charstatus= '1' WHERE usr_index = '$uid'";
$update = mysql_query($aendern);
$_SESSION["charstat"]=1;








//GOLD WIRD GESETZT
$einsetzen = "INSERT INTO inv (u_id) 
VALUES
('$uid')";
$eintrag = mysql_query($einsetzen);













}

?>