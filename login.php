<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//HTML HEADER laden 
include 'header.html';



echo "  <html> <body> <form action='log.php' method='post'>

    <fieldset>
        <legend class='standardschrift'>Einloggen </legend>
<table>
<tr>
<td>
        <label class='standardschrift'>Mailadresse</label></td><td> <input type='text' name='Mailadresse'/></td></tr>
<tr>
<td>
        <label class='standardschrift'>Passwort</label></td><td><input type='password' name='Password'/></td></tr>
  
  <tr>
<td>      <input type='submit' name='formaction' value='OK' /></td></tr></table>
    </fieldset>
</form>
";



?>


 

