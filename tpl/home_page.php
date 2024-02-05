<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>home page</title>
</head>
<style type="text/css">
	.welcome{
		text-align: center;
	}
</style>

<body>
      <div class="welcome">      	
	  <h1>Welcome Home Page : <?php echo $_SESSION['user_name']; ?></h1>
      </div>

</body>
</html>