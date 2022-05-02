<?php
class Product{
public $db = null;
public function __construct(DBController $db)
{
    if(!isset($db->con)) return null;
    $this->db = $db;
}
// fetch product data using getData method
public function getData($table = "Product"){

  $result =   $this->db->con->query("SELECT * FROM {$table}");
 $resultArray = array();
while( $item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $resultArray[] = $item;
}

return $resultArray;
}


public function getCategory($table = "Category"){

    $result =   $this->db->con->query("SELECT * FROM {$table}");
   $resultArray = array();
  while( $item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $resultArray[] = $item;
  }
  
  return $resultArray;
  }

public function getCategoryEdit($id){
 
     $query= "SELECT * FROM Category WHERE categoryID = '$id'";
     $result = $this->db->con->query($query)->fetch_assoc();
  return $result;
}


 public function getEdit($editID){
        $query = "SELECT * FROM Product WHERE productID = '$editID'";
        $result = $this->db->con->query($query);
        $row = $result->fetch_assoc();
        return $row;
} 


  }
