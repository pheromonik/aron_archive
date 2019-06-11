<?php 
  class Asqlwrapper {
    private $tableName;
    
    public function __construct($nOfTable) {
      $this->tableName=$nOfTable;
    }
    public function __destruct() {
    }
    
    public function GetValue($testName, $testValue, $returnField) {
      $daten=$this->GetRow($testName, $testValue);
      if (empty($daten))
        return NULL;
      else
        return $daten["$returnField"];
    }
    
    public function GetRow($testName, $testValue) {
      $abfrage = "SELECT * FROM  $this->tableName WHERE $testName LIKE '$testValue'";
      $ergebnis = mysql_query($abfrage);
      $daten = mysql_fetch_array($ergebnis);
      return $daten;
    }
    
    public function Entry($fieldNames,$values) {
    $fieldNameValues=preg_split("/[\s,]+/", $fieldNames);
      foreach ($values as $entry => $value) {
        if (is_array($value)) {
          $value=json_encode($value);
        }
        if ("$value" != "NOW()") {
          $values[$entry]="'$value'";
        }
        if (is_Null($value)) {
          unset($fieldNameValues[$entry]); 
          unset($values[$entry]);
        }
      }
      $fieldNameValues=array_values($fieldNameValues);
      $values=array_values($values);
      $valuesString=implode(",",$values);
      $fieldNamesString=implode(",",$fieldNameValues);
      $Sqlab = "INSERT INTO $this->tableName ($fieldNamesString) VALUES ($valuesString)";
      return mysql_query($Sqlab);
    }
//     "UPDATE user_daten SET message_ids='$message_ids' WHERE usr_index = '$empfi'";
    public function ReplaceEntry($testName, $testValue, $updateFieldName, $updateFieldValue) {
//       $value=$this->GetValue($testName, $testValue, $updateFieldName);
      $aendern = "UPDATE $this->tableName SET $updateFieldName='$updateFieldValue' WHERE $testName = '$testValue'";
      mysql_query($aendern);
    }
    
    public function RemoveEntry($testName, $testValue, $updateFieldName) {
      $this->Update($testName, $testValue, $updateFieldName, "");
    }
  }
  

//   if ($postbox="null")
// {
//   $message_ids=array("inbox"=>array($pn_id));
//   $message_ids=json_encode($message_ids);
//   $aendern = "UPDATE user_daten SET message_ids='$message_ids' WHERE usr_index = '$empfi'";
//   mysql_query($aendern);
// }
// else
// {
//   $postbox=json_decode($postbox);
//   $postbox["inbox"][count($postbox["inbox"])]="$pn_id";
//   $postbox=json_encode($postbox);
//   $aendern = "UPDATE user_daten SET message_ids='$message_ids' WHERE usr_index = '$empfi'";
//   mysql_query($aendern);
// }
?>