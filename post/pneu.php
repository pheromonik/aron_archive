<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//Datenbankverbindung wird aufgebaut
//include 'includes/dbconnect.php';

//HTML HEADER laden 
include 'header.html';
//Anzeige des Antwortformulars 

echo "<form class='standardschrift' action=\"/message.php?section=eintragen\" method=\"POST\"  name=\"myForm\" onsubmit=\"return validate();\">

    <fieldset>
        <legend>Nachricht:</legend>
<table>
<tr>
<td>
        <label>Empfänger  <input type=\"text\" name=\"empfang\" required></label></td></tr>
<tr>
<td>
        <label>Betreff: <input type=\"text\" name=\"betreff\" maxlength=\"200\"></br></label></td></tr>


<tr>
<td>
        <label><textarea cols=\"80\" rows=\"15\" name=\"text\" maxlength=\"15000\"/></textarea></br></label></td></tr>
     
  <tr>
<td>      <input type=\"submit\" name=\"formaction\" value=\"absenden\" /></td></tr></table>
    </fieldset>
</form> ";


?>
