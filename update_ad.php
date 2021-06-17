<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

  include 'dbconnect.php';
 
  $fnameedit = $_POST["fnameedit"];
  $lnameedit = $_POST["lnameedit"];

  $sql="UPDATE `employee` SET `Fname` = '$fnameedit',`Lname` = '$lnameedit' WHERE `employee`.`Ssn` = ${ssn}";

  
  $result = mysqli_query($conn, $sql);

}
  
  ?>