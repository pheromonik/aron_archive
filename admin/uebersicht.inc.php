<?php
//Wieviele User sind registriert? 
$statement = mysql_query("SELECT COUNT(*) AS anzahl FROM user_daten");
$row = mysql_fetch_object($statement);
echo "Es wurden ".$row->anzahl." User gefunden";

//Wieviele User sind gerade online? 


//Zeige alle registrierten User an. 







?>