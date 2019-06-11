<?php
/* Es sollen alle Fehler mit Fehlermeldung ausgegeben werden! */

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  include "./../includes/dbconnect.inc.php";
  
  $fractionNames=array("Neutral", "Hornets");
  $colorNames=array("White", "Red", "Blue", "Yellow");  

  $planets = new Asqlwrapper("planets");
  $id=1;
  $planet = $planets->GetRow("pla_id","$id");
  $stars=array();
  while(!empty($planet)) {
    $koord1=$planets->GetValue("pla_id","$id","pla_koord1");
    $koord2=$planets->GetValue("pla_id","$id","pla_koord2");
    $koord3=$planets->GetValue("pla_id","$id","pla_koord3");
    $name=$planets->GetValue("pla_id","$id","pla_name");
    $fraction=$planets->GetValue("pla_id","$id","pla_fraktion");
    
    $stars[$id-1]=array("id"=>"$id", "name"=>"$name", "x"=>"$koord1", "y"=>"$koord2", "z"=>"$koord3", "fraction"=>$fractionNames[$fraction], "color"=>$colorNames[($id-1)%4], "size"=>"5");
    $id=$id+1;
    $planet = $planets->GetRow("pla_id","$id");
  }
?>