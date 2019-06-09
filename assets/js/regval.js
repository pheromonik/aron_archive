

function pruefepasswort() {
var pass1=document.Formular.passwort.value;
var pass2=document.Formular.passwort2.value;
if (document.Formular.Password.value != document.Formular.Password2.value) {
// document.write ("passwörter=" + pass1 + "Pass2=" + pass2);
alert ("Fehler. Bitte überprüfen Sie ihre Passwortangaben");
document.Formular.Password.focus();
return false;
}}

