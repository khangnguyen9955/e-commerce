<?php
include'connection.php';
class User{
public $db;

    public function reg_user($name,$email,$password,$address,$phone){
        $conn = db();
        $sql = "SELECT * FROM Customer WHERE email='$email'";
        $check =$this->db->query($sql);
        $count_row = $check->num_rows;
        if($count_row == 0){
            $sql1 = "INSERT INTO Customer SET fullName = '$name', email ='$email', address='$address', phone = '$phone', password='$password'";
            $result = mysqli_query($conn,$sql1) or
            die(mysqli_connect_errno(). "Data cannot insert");
            return $result;
        }else{
            return false;
        }
    }
    public function userLogin($email, $password)
    {
        $conn = db();

        $sql3="SELECT email from Customer WHERE email='$email' and password='$password'";
        $result1 = mysqli_query($conn,$sql3);
        $user_data = mysqli_fetch_array($result1);
        $count_row = $result1->num_rows;
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


    public function checkLogin($email, $password)
    {
        $conn = db();
        $sql2="SELECT  * from Admin WHERE email='$email' and password='$password'";
        $result = $conn->query($sql2);
        $admin_data =$result->fetch_assoc();
        $count_row = $result->num_rows;
        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['uid'] = $admin_data['adminID'];
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
    public function get_fullname($uid)
    {
        $conn = db();

        $sql4="SELECT fullName FROM Admin WHERE adminID = '$uid'";
        $result4 =$conn->query($sql4);
        $name_admin=$result4->fetch_assoc();
        echo $name_admin['fullName'];
    }
    public function getImage($uid)
    {
        $conn = db();

        $sql5="SELECT image FROM Admin WHERE adminID = '$uid'";
        $result5 =$conn->query($sql5);
        $image_admin=$result5->fetch_assoc();
        echo $image_admin['image'];
    }

}
?>