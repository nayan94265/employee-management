<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: emp_login.php");
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome - <?php echo $_SESSION['email']?></title>
  </head>
  <body>

  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/project"><b>iSecure</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/project/emp_welcome.php"><b>Home</b> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><b>About</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><b>Contact</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/project/logout.php"><b>Logout</b></a>
      </li>
       
      
    </ul>
    
  </div>
</nav>
    
    
    <div class="container my-2 ">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['email']?></h4>
      <p>Hey how are you doing? Welcome to iSecure. You are logged in as <?php echo $_SESSION['email']?>. Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/loginsystem/logout.php"> using this link.</a></p>
    </div>
  </div>

  <div class="container-md border mt-lg-5">
  <table class="table m-4">
   <h3 class=" text-center "> Your Comapany Details</h3>
      <thead>
        <tr>
          <th scope="col">Sno.</th>
          <th scope="col">Fname</th>
          <th scope="col">Lname</th>
          <th scope="col">Ssn</th>
          <th scope="col">Bdate</th>
          <th scope="col">Address</th>
          <th scope="col">Mgr_Ssn</th>
          <th scope="col">Salary</th>
          <th scope="col">Dno</th>
          <th scope="col">email</th>
        </tr>
      </thead>
      <tbody>

       <?php 
          $sql = "SELECT * FROM `employee` where employee.Ssn = $_SESSION[ssn]";
          include 'dbconnect.php';
          $result = mysqli_query($conn, $sql);
          
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['Fname'] . "</td>
            <td>". $row['Lname'] . "</td>
            <td>". $row['Ssn'] . "</td>
            <td>". $row['Bdate'] . "</td>
            <td>". $row['Address'] . "</td>
            <td>". $row['Super_ssn'] . "</td>
            <td>". $row['Salary'] . "</td>
            <td>". $row['Dno'] . "</td>
            <td>". $row['email'] . "</td>
            
          </tr>";
        } 
          ?>


      </tbody>
  </table>
  </div>

  <div class="container-md border mt-lg-5">
    <table class="table m-4" id="myTable">
    <h3 class=" text-center m-2"> Your Project Details</h3>
      <thead>
        <tr>
        <th scope="col">Sno.</th>
        <th scope="col">Emp_Ssn</th>
          <th scope="col">Project Name</th>
          <th scope="col">Project Number</th>
          <th scope="col">Project Location</th>
          <th scope="col">Department Number</th>
          
        </tr>
      </thead>
      <tbody>

       <?php 
          // $sql = "SELECT * FROM `project`";
          // $sql1 = "SELECT * FROM `employee`";
          $sql = "SELECT * FROM `employee`,`project` WHERE employee.Dno=project.Dnum AND employee.Ssn= $_SESSION[ssn]";
          include 'dbconnect.php';
          $result = mysqli_query($conn, $sql);
          
          
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['Ssn'] . "</td>
            <td>". $row['Pname'] . "</td>
            <td>". $row['Pnumber'] . "</td>
            <td>". $row['Plocation'] . "</td>
            <td>". $row['Dnum'] . "</td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>



  <div class="container-md border mt-lg-5">
    <table class="table m-4" id="myTable">
    <h3 class=" text-center m-2"> Your Department Details</h3>
      <thead>
        <tr>
        <th scope="col">Sno.</th>
        <th scope="col">Emp_Ssn</th>
          <th scope="col">Department Name</th>
          <th scope="col">Department Number</th>
          <th scope="col">Manager Ssn</th>
          
          
        </tr>
      </thead>
      <tbody>

       <?php 
          // $sql = "SELECT * FROM `project`";
          // $sql1 = "SELECT * FROM `employee`";
          $sql = "SELECT * FROM `employee`,`department` WHERE employee.Dno=department.dnumber and employee.Ssn=$_SESSION[ssn]";
          include 'dbconnect.php';
          $result = mysqli_query($conn, $sql);
          
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['Ssn'] . "</td>
            <td>". $row['dname'] . "</td>
            <td>". $row['dnumber'] . "</td>
            <td>". $row['mgr_ssn'] . "</td>
          
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>       
            




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>