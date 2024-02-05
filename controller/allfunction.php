<?php

 include "conn.php";


 class user_management{

 	public function addUser($data){
 		global $conn;
 		$sql = "INSERT INTO user set `username`='".$data['username']."', `email`='".$data['email']."', `password`='".md5($data['password'])."'";
 		$result = mysqli_query($conn, $sql); 
 	}

  public function logindata($data){
    global $conn;
    $sql = "SELECT * FROM `user` where `email`='".$data['email']."' AND `password`='".md5($data['password'])."'";
    $result = mysqli_query($conn,$sql);
   $num = mysqli_num_rows($result);

   if ($num==1) {
     $row = mysqli_fetch_assoc($result);     
    $_SESSION['user_name'] = $row['username'];    
    $_SESSION['email'] = $row['email'];    
     header('location:home_page.php');
   }else{
    echo "<h1 style='color: white; text-align: center; background-color: red'; >USER NOT FOUND</h1>";
   }

    return $result;

  }

  public function userGets(){//on list data show...
  	global $conn;
  	$sql="SELECT * FROM `user` ORDER BY `user_id` DESC";
  	$result = mysqli_query($conn, $sql);
  	return $result;
  }

  public function userGet($id){//on updateform data hold...
    global $conn;
    $sql="SELECT * FROM `user` WHERE `user_id`=$id";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) {
      $row=mysqli_fetch_assoc($result);
      return $row;
    }

   }

   public function userUpdate($data){
     global $conn;
     $user_id = $data['user_id'];
     $sql= "UPDATE user set `username`='".$data['username']."', `email`='".$data['email']."' WHERE `user_id`= '".$user_id."'";

     $result = mysqli_query($conn, $sql);
     return $result;
   }   

   public function userDelete($id){
     global $conn;
     $sql = "DELETE FROM user WHERE `user_id`=$id";
     $result = mysqli_query($conn, $sql);
     return $result;
   }
   
    public function user_velidation($data){
      global $conn;
      $error=array();
      if (empty($data['username'])) {
        $error['username']="* enter your Username..!";
      }
      if (empty($data['email'])) {
        $error['email']="* enter your email..!";
      }
      else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $error['email'] = "Invalid email format";
        }
      }  
      
      if (strlen($data['password']) < 8 || strlen($data['password']) > 16) {
      $error['password'] = "Password should be min 8 characters and max 16 characters";
      }
      
      return $error;
   }
    
 }//end class..






?>