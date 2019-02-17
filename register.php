<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//HTML HEADER laden 
include 'header.html';



echo "  <html> <body>
<p>
					 <form action='index.php?section=reg' method='post' autocomplete='off'>

    <fieldset>
        <legend>Registriere dich:</legend>
<table>
<tr>
<td>
        <label>Username</td><td> <input type='text' name='Username' placeholder='MUSTERMENSCH' required/></label></td></tr>
		<td>
</tr><tr>
<td>
        <label>Mailadresse</td><td> <input type='text' name='Mailadresse' placeholder='mustermensch@mustermail.de' required/></label></td></tr>
		<td>
        <label>Best&auml;tige Mailadresse</td><td> <input type='text' name='Mailadresse2'placeholder='mustermensch@mustermail.de' required/></label></td></tr>
<tr>
<td>
        <label>Passwort</td><td><input type='password' name='Password' placeholder='Passwort' required//></br></label></td></tr>
  
  <tr>
  <tr>
<td>
        <label>Best&auml;tige Passwort</td><td><input type='password' name='Password2' placeholder='Passwort' required//></br></label></td></tr>
  
  <tr>
<td>      <input type='submit' name='formaction' value='OK'/></td></tr></table>
    </fieldset>
</form>
 
				</p>";
				
?>