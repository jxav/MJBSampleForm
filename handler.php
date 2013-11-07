<?php
/*
 This file was created by Francisco Velazquez 11/7/13
 This a sample of database access

*/

if (!extension_loaded('pdo_mysql') && !extension_loaded('PDO')) {
    echo 'PDO is required in order for this to work!!!';
    exit(0);
}

//Setup variables from $_POST
$action = $_POST['action'];
$name   = $_POST['name'];
$comment = $_POST['comment'];

//Check to see if it is a data filled call
if( $action != 'Delete Record' && (empty($action) || empty($name) || empty($comment)) ){
   echo (!(isset($_POST['action']))?"":"Please make sure that all fields have data");
}else{
   recordController($action, $name, $comment);
}  


//function used to handle the requests appropriatley

function recordController($action, $name, $comment){
  //Setup DB connection using PDO
  $MySQLObject = new PDO('mysql:host=localhost;dbname=userrecords','root','');
  //incase charset is set to other than UTF-8 / UCS-2 / Latin-1 / ASCII
  $MySQLObject->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  
 //Switch between according to what is called
  switch($action){
   //Add a record 
   case 'Add Record':
      $sql = "INSERT INTO recordsList(name,comment)" .
      "VALUES(?,?)";
       //prepare our query
       $resultIns = $MySQLObject->prepare($sql);
       $resultIns->bindParam(1,$name,PDO::PARAM_STR);
       $resultIns->bindParam(2,$comment,PDO::PARAM_STR);
       $resultIns->execute();
       //Check for errors 
       if($resultIns->errorCode() !== '00000'){ 
         die("Could not add record ".$resultIns->errorCode());
        }
      break;
    //Delete a Record or Set
    case 'Delete Record':
      //Get the record id/Array to delete
      $recordID = $_POST['ID'];
      //Check to see if we have data   
      if(empty($recordID)) break;
       //iterate through the post array
       foreach($recordID as &$ID){
        $sql = "DELETE FROM recordsList WHERE ID = ?";
        $resultDel = $MySQLObject->prepare($sql);
        $resultDel->bindParam(1,$ID,PDO::PARAM_INT);
        $resultDel->execute();
        if($resultDel->errorCode() !== '00000') die("Could not delete record. ");
      }
      break; 
    default:
      break;
   }
   
    //Load all records
    $resultSel=$MySQLObject->prepare("SELECT * from recordsList");
    $resultSel->execute();
     if($resultSel->errorCode() === '00000'){
        echo json_encode($resultSel->fetchAll());
     }
  
 }

?>
