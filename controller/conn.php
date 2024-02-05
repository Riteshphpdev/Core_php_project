<?php

 $conn = mysqli_connect("localhost","root","","usermanagement_db");

 if ($conn) {
    //echo "database conection successfull ...";
 }else{
 	echo "database conection Faild ....error!";
 }


?>