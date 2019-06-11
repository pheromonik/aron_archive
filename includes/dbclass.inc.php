<?php 
  class Asqlwrapper {
    private $tableName;
    private $connection;
    private $servername;
    private $username;
    private $password;
    private $dbname;    
    
    public function __construct($nOfTable, $sname = "mysql.webhosting61.1blu.de", $uname = "s186687_2828146", $pw = "q8os(DmEwoxIM#n", $db = "db186687x2828146") {
      $this->tableName=$nOfTable;
      $this->servername=$sname;
      $this->username=$uname;
      $this->password=$pw;
      $this->dbname=$db;
      $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
      if (!$this->connection) {
        echo "Could not connect to database"; 
        die("Connection failed: " . mysqli_connect_error());
      }      
    }
    public function __destruct() {
      if ($this->connection) {
        $this->connection->close();
      }
    }
    
    public function GetValue($testName, $testValue, $returnField) {
      $abfrage="SELECT $returnField FROM  $this->tableName WHERE $testName LIKE '$testValue'";
      $daten=$this->connection->query($abfrage);
      if ($daten->num_rows > 0) {
        return $daten->fetch_assoc()["$returnField"];
      }
      else {
        return NULL;
        }
    }
    
    /*public function GetRow($testName, $testValue) {
      $abfrage = "SELECT * FROM  $this->tableName WHERE $testName LIKE '$testValue'";
      $ergebnis = mysqli_query($abfrage);
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
      return mysqli_query($Sqlab);
    }
  //     "UPDATE user_daten SET message_ids='$message_ids' WHERE usr_index = '$empfi'";
    public function ReplaceEntry($testName, $testValue, $updateFieldName, $updateFieldValue) {
  //       $value=$this->GetValue($testName, $testValue, $updateFieldName);
      $aendern = "UPDATE $this->tableName SET $updateFieldName='$updateFieldValue' WHERE $testName = '$testValue'";
      mysqli_query($aendern);
    }
    
    public function RemoveEntry($testName, $testValue, $updateFieldName) {
      $this->Update($testName, $testValue, $updateFieldName, "");
    }
    */ 
  }
  

//   if ($postbox="null")
// {
//   $message_ids=array("inbox"=>array($pn_id));
//   $message_ids=json_encode($message_ids);
//   $aendern = "UPDATE user_daten SET message_ids='$message_ids' WHERE usr_index = '$empfi'";
//   mysqli_query($aendern);
// }
// else
// {
//   $postbox=json_decode($postbox);
//   $postbox["inbox"][count($postbox["inbox"])]="$pn_id";
//   $postbox=json_encode($postbox);
//   $aendern = "UPDATE user_daten SET message_ids='$message_ids' WHERE usr_index = '$empfi'";
//   mysqli_query($aendern);
// }
?>