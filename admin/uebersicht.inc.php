<?php



//$pdo = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');

$statement = mysql_query("SELECT COUNT(*) AS anzahl FROM user_daten");
$row = mysql_fetch_object($statement);
echo "Es wurden ".$row->anzahl." User gefunden";


//$result = mysql_query("SELECT COUNT(usr_index) FROM user_daten AS anzahldaten");
//$row= $result->fetch();


//echo "Zur Zeit sind ".$row['anzahldaten']." User registriert."; 



?>