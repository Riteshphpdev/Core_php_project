
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
.loginpage{
	margin-left: 5%;
	width: 15%;
}
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */

.clearfix{
	margin-left: 400px;
}
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }

  .loginpage{
  	width: 20px;
  }
}
</style>
<body>

	<?php
  include '../controller/allfunction.php';
  	$obj = new user_management();
  	
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['id'])) {
    	$obj->userUpdate($_POST);
    	header("Location: user_list.php?success=1");
    }
  }

?>

<?php
 if (isset($_GET['id'])) {
 	$id= $_GET['id'];
 	$result = $obj->userGet($id);
 	$user_id= $result['user_id'];
 	$username= $result['username'];
 	$email= $result['email'];
 }


?>

<form method="POST" action="" enctype="multipart/form-data" style="border:1px solid #ccc">
	<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
  <div class="container">
    <h1 style="text-align: center;"> Edit User Registration Form</h1>    
    <hr>

    <label for="name"><b>User Name</b></label>
    <input type="text" placeholder="Enter your full username" name="username" value="<?php echo $username; ?>" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo $email; ?>" required>

   
    <div class="clearfix">
      <button type="submit" class="signupbtn">Update</button>
    </div>
  </div>
</form>

</body>
</html>