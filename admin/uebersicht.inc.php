<?php

$result = mysql_query("SELECT * FROM  usr_daten");
$num_rows = mysql_num_rows($result);

echo "Zur Zeit sind ".$num_rows." User registriert."; 



?>