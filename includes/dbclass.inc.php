<?php 
  class Asqlwrapper {
    private $tableName;
    
    public function __construct($nOfTable) {
      $this->tableName=$nOfTable;
    }
    public function __destruct() {
    }
    
    public function GetValue($testName, $testValue, $returnField) {
      $abfrage = "SELECT * FROM  $this->tableName WHERE $testName LIKE '$testValue'";
      $ergebnis = mysql_query($abfrage);
      $daten = mysql_fetch_array($ergebnis);
      if (empty($daten))
        return NULL;
      else
        return $daten["$returnField"];
    }
  }
?>