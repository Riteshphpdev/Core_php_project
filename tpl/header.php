<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.logout{
	margin-left: 70%;
}
</style>
</head>
<body>

	<?php
    
      session_start();
    
     if (!isset($_SESSION['email'])) {           
        header('location:index.php');
        exit;
     }
  ?>

<div class="topnav">
  <a class="active" href="home_page.php">Home</a>
  <a href="user_list.php">User List</a>
  
  <a class="logout" href="logout.php">Logout</a>
</div>



</body>
</html>
