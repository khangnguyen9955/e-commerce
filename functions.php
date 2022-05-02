<?php
require('./database/DBController.php');
require('./database/Product.php');

$db = new DBController();
$product = new Product($db);
class Operations{
 public function addProduct(){
    if(isset($_POST['addnew']))
    {
      $productID=$_POST['productID'];
      $name=$_POST['name'];
      $price=$_POST['price'];
      $details=$_POST['details'];
      $image=$_POST['image'];
      $categoryID=$_POST['categoryID'];
      if($this->insert($productID,$name,$price,$details,$image,$categoryID)){
            header("Location: admin/index.php?msg1=insert");

        }
      else{
            echo "Error";
        }
    }
}

    function insert($a,$b,$c,$d,$e,$f){
        global $db;
        $query= "insert into Product(productID,name,price,details,image,categoryID) values('$a','$b', '$c', '$d', '$e','$f' )";
        $result = mysqli_query($db->con,$query);
        if ($result) {
            return true;
        }
        else
        {
         return false;
        }
    }

    public function editProduct($postEdit){
		{
            global $db;
		    $productID = $db->con->real_escape_string($_POST['productID']);
            $name=$db->con->real_escape_string($_POST['name']);
            $price=$db->con->real_escape_string($_POST['price']);
            $details=$db->con->real_escape_string($_POST['details']);
            $image=$db->con->real_escape_string($_POST['image']);
            $categoryID=$db->con->real_escape_string($_POST['categoryID'] );
            //
		if (!empty($productID) && !empty($postEdit)) {
            if($categoryID == null || $categoryID=="" ){
                header("location: edit.php?id=$productID");
                echo "<div class='alert alert-danger alert-dismissible'>
               Input product category.
            </div>";
            }
			$query = "UPDATE Product SET name = '$name', price = '$price',  details = '$details' ,image = '$image' , categoryID = '$categoryID' WHERE productID = '$productID'";
            echo $query;
            $sql = $db->con->query($query);
			if ($sql==true) {

                header("Location:  admin/index.php?msg2=update");
            }else{
			    echo "Registration updated failed try again!";
			}
		    }

		}

    }
    function getEdit(){
        global $db;
        if(isset($_GET['id'])){
            $editID = $_GET['id'];
            $query = "SELECT * FROM Product WHERE productID = {$editID}";
		    $result = $db->con->query($query);
            echo $result;
		    if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
        }
    }

    public function deleteProduct($id){
        global $db;

        $query = "DELETE FROM Product WHERE productID = '$id'";
        $sql = $db->con->query($query);
    if ($sql==true) {
        header("Location:  admin/index.php?msg3=delete");
    }else{
        echo "Record does not delete try again";
        }
    }

    public function reg_user($name,$email,$password,$address,$phone){
     global $db;
     $sql = "SELECT * FROM Customer WHERE email='$email'";
     $check = $db->query($sql);
     $count_row = $check->num_rows;
     if($count_row == 0){
         $sql1 = "INSERT INTO Customer SET fullName = '$name', email ='$email', address='$address', phone = '$phone', password='$password'";
         $result = mysqli_query($db,$sql1) or
         die(mysqli_connect_errno(). "Data cannot insert");
            return $result;
     }else{
         return false;
     }
    }
    public function checkLogin($email, $password){
     global $db;
            $sql2="SELECT email from Customer WHERE email='$email' and password='$password'";

            $result = mysqli_query($db,$sql2);
            $user_data = mysqli_fetch_array($result);
            $count_row = $result->num_rows;

            if ($count_row == 1) {
                // this login var will use for the session thing
                $_SESSION['login'] = true;
                $_SESSION['uid'] = $user_data['customerID'];
                return true;
            }
            else{
                return false;
            }
        }
        public function getSession(){
            return $_SESSION['login'];
        }
        public function userLogout(){
     $_SESSION['login'] = FALSE;
     session_destroy();
        }


}
