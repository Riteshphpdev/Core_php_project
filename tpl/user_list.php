<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
.editbtn{
  border: none;
  background-color: lightgreen;
}
.deletebtn{
  background-color: red;
  border: none;
}
</style>
</head>
<body>
<?php
if (isset($_GET['success']) && $_GET['success'] == 1 )
{

   echo "<h2 class='succmsg' style='text-align: center; background-color: lightgreen; color: white;'>User List Update successfully!</h2>";
}
?>
<h2 style="text-align: center;">User List</h2>
<table>
  <tr>
    <th>User ID</th>
    <th>User Name</th>
    <th>E-mail</th>
    <th>Action</th>
  </tr>
	<?php  
     include "../controller/allfunction.php";
      $obj = new user_management();
      $user_data = $obj->userGets();     
          foreach ($user_data as $value) { ?>
			<tr>
			<td><?php echo $value['user_id']; ?></td>
			<td><?php echo $value['username']; ?></td>
			<td><?php echo $value['email']; ?></td>
			<td>
				<button class="editbtn"><a href="register_update_form.php?id=<?php echo $value['user_id']; ?>">Edit</a>  </button>
        <button class="deletebtn"><a href="user_list.php?id=<?php echo $value['user_id']; ?>">Delete</a></button>
			</td>
			</tr>
         <?php }
	  ?>
</table>
</body>


<?php

if (isset($_GET['id'])) {
  $obj->userDelete($_GET['id']);
  header('location: user_list.php');
}

?>
</html>