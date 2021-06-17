<?php
session_start();
$showAlert = false;
$showError = false;
$update=false;
$delete=false;

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: admin_login.php");
    exit;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset( $_POST['snoEdit'])){
    include 'dbconnect.php';
    $ssn = $_POST["snoEdit"];
    $fname = $_POST["fnameedit"];
    $lname = $_POST["lnameedit"];
    $bdate = $_POST["bdateedit"];
    $address = $_POST["addressedit"];
    $salary = $_POST["salaryedit"];
    $dno = $_POST["dnoedit"];
    $email = $_POST["emailedit"];
   

  $sql="UPDATE `employee` SET `Fname` = '$fname',`Lname` = '$lname',`Bdate`='$bdate',
  `Address`='$address',`Salary`='$salary',`Dno`='$dno',`email`='$email' WHERE `employee`.`Ssn` = $ssn";

  
  $result = mysqli_query($conn, $sql);

$update=true;}

    else{
    include 'dbconnect.php';
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $ssn = $_POST["Ssn"];
    $bdate = $_POST["bdate"];
    $address = $_POST["address"];
    $Mssn = $_POST["Mssn"];
    $salary = $_POST["salary"];
    $dno = $_POST["dno"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
  

    

  $sql ="INSERT INTO `employee` (`Fname`,`Lname`,`Ssn`,`Bdate`,`Address`,`Salary`,`Super_ssn`,`Dno`,`email`,`password`) VALUES ('$fname', '$lname ', '$ssn', '$bdate', '$address', '$Mssn', '$salary', '$dno ','  $email','$password')";

  

  $result = mysqli_query($conn, $sql);

  
        if ($result){
            $showAlert = true;
        }
    
    else{
        $showError = "ERROR";
    }

}
}
if(isset($_GET['delete'])){
  include 'dbconnect.php';
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `employee` WHERE `employee`.`Ssn` = $sno";
  $result = mysqli_query($conn, $sql);
}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->



 
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css.css">
   -->

   <style>



     
   </style>

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

    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($update){
    echo ' <div class="alert alert-succes alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Details has been Updated Succesfully in the Database
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($delete){
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Employee details Deleted Succefully
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div> ';
      }
    ?>
    
    <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['email']?></h4>
      <p>Hey how are you doing? Welcome to iSecure. You are logged in as <?php echo $_SESSION['email']?>. Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/loginsystem/logout.php"> using this link.</a></p>
    </div>
  </div>



<div class="btn-group card-deck ml-5 justify-content-center">
  <div class="row m-5 ">
   
  <div button type="button" class="btn btn-primary pt-5 btn-lg " class="card text-white " id="addemployee" data-toggle="modal" data-target="#addemp" style="max-width: 20rem; height:15rem; cursor:pointer;">

    <h1 class=" align-items-center text-xl-center"><b>Add Employee to Database</b></h1>
</div>
   
  

<div button type="button" class="btn btn-warning btn-lg ml-3" class="card text-light" id="updateemployee" data-toggle="modal" data-target="#updateemp" style="max-width: 20rem; height:15rem;cursor:pointer;">

    <h1 class="card-text pt-3 text-xl-center"><b>View and Update Employee Data Table</b></h1>
</div>
  
</div>


  </div>




  <!-- The Modal -->
  <div class="modal" id="addemp">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Fill below Detials</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form action="/project/admin_welcome.php" method="post">
                <div class="form-group">
                    <label for="fname">Fname</label>
                    <input type="name" class="form-control" id="fname" name="fname" >
                </div>
                <div class="form-group">
                    <label for="lname">Lname</label>
                    <input type="name" class="form-control" id="lname" name="lname" >
                </div>
                <div class="form-group">
                    <label for="Ssn">Ssn</label>
                    <input type="number" class="form-control" id="Ssn" name="Ssn" >
                </div>
                <div class="form-group">
                    <label for="bdate">Bdate</label>
                    <input type="date" class="form-control" id="bdate" name="bdate" >
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="name" class="form-control" id="address" name="address" >
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" class="form-control" id="salary" name="salary" >
                </div>
                <div class="form-group">
                    <label for="Mssn">Manager Ssn</label>
                    <input type="number" class="form-control" id="Mssn" name="Mssn" >
                </div>
                <div class="form-group">
                    <label for="dno">Department No.</label>
                    <input type="number" class="form-control" id="dno" name="dno" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            
                 
                <button type="submit" class="btn btn-primary">Add</button>
             </form>
        </div>
    
        <!-- Modal footer --> 
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>




<!-- The Modal -->
<div class="modal" id="updateemp">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"> Update Employee Data Table</h4>
          <button class ="btn btn-info mx-4 btn-lg" id="viewpro" data-toggle="modal" data-target="#viewproject">Project</button>
          <button class ="btn btn-info mx-4  btn-lg" id="viewdepartment" data-toggle="modal" data-target="#viewdep">Department</button>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
    
    <table class="table">
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
          $sql = "SELECT * FROM `employee`";
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
            <td> <button  id=".$row['Ssn']." class='edit btn btn-sm btn-primary m-1' data-toggle='modal' data-target='#uemp'>Edit</button> <button id=".$row['Ssn']." class='delete btn btn-sm btn-primary'>Delete</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
            
        </div>
    
        <!-- Modal footer --> 
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>




   <!-- The Modal -->
  <div class="modal" id="viewproject">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Project Detials</h4>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
    
    <table class="table" id="myTable">
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
          $sql = "SELECT * FROM `employee`,`project` WHERE employee.Dno=project.Dnum";
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
    
        <!-- Modal footer --> 
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal" id="viewdep">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Department Detials</h4>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
    
    <table class="table" id="myTable">
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
          $sql = "SELECT * FROM `employee`,`department` WHERE employee.Dno=department.dnumber";
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
    
        <!-- Modal footer --> 
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


    <!-- The Modal -->
    <div class="modal" id="uemp">
    <div class="modal-dialog ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Employee Detials</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <form action="/project/admin_welcome.php" method="POST">
        <input type="hidden" name="snoEdit" id="snoEdit">
      <div class="form-group">
      

        <label for="fnameedit">First Name</label>
        <input type="text" class="form-control" id="fnameedit" name="fnameedit" >
      </div>

      <div class="form-group">
        <label for="lnameedit">Last Name</label>
        <input type="text"  class="form-control" id="lnameedit" name="lnameedit" ></input>
      </div>

      <div class="form-group">
        <label for="bdateedit">Birth date</label>
        <input type="date" class="form-control" id="bdateedit" name="bdateedit" ></input>
      </div>
      <div class="form-group">
                    <label for="addressedit">Address</label>
                    <input type="name" class="form-control" id="addressedit" name="addressedit" >
                </div>
                <div class="form-group">
                    <label for="salaryedit">Salary</label>
                    <input type="number" class="form-control" id="salaryedit" name="salaryedit" >
                </div>
             
                <div class="form-group">
                    <label for="dnoedit">Department No.</label>
                    <input type="number" class="form-control" id="dnoedit" name="dnoedit" >
                </div>
                <div class="form-group">
                    <label for="emailedit">Email</label>
                    <input type="email" class="form-control" id="emailedit" name="emailedit" aria-describedby="emailHelp">
                    
                </div>
      <button type="submit" class="btn btn-primary">Update Detials</button>
    </form>
        
            
        </div>
    
        <!-- Modal footer --> 
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


    <!-- The Modal -->
  <div class="modal" id="updproject">
    <div class="modal-dialog ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Project Detials</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

        <form action="/project/admin_welcome.php" method="POST">
        <!-- <input type="hidden" name="snoEditpro" id="snoEditpro"> -->
      <div class="form-group">
      

        <label for="pnameedit">Project Name</label>
        <input type="text" class="form-control" id="pnameedit" name="pnameedit" >
      </div>

      <div class="form-group">
        <label for="pnumedit">Project No.</label>
        <input type="number"  class="form-control" id="pnumedit" name="pnumedit" ></input>
      </div>

      <div class="form-group">
        <label for="plocedit">Project Location</label>
        <input type="text" class="form-control" id="plocedit" name="plocedit" ></input>
      </div>
      <div class="form-group">
                    <label for="dnumedit">Department No.</label>
                    <input type="number" class="form-control" id="dnumedit" name="dnumedit" >
                </div>
               
                    
                </div>
      <button type="submit" class="btn btn-primary">Update Detials</button>
    </form>
        
            
        </div>
    
        <!-- Modal footer --> 
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

 


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>


  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        // console.log("edit ");
        tr = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        fname = tr.getElementsByTagName("td")[0].innerText;
        lname = tr.getElementsByTagName("td")[1].innerText;
        bdate = tr.getElementsByTagName("td")[3].innerText;
        address = tr.getElementsByTagName("td")[4].innerText;
        salary = tr.getElementsByTagName("td")[6].innerText;
        dno = tr.getElementsByTagName("td")[7].innerText;
        email = tr.getElementsByTagName("td")[8].innerText;
       

        console.log(fname, lname,bdate,address,salary);
        fnameedit.value =  fname;
        lnameedit.value = lname;
        bdateedit.value = bdate;
        addressedit.value = address;
        salaryedit.value = salary;
        dnoedit.value = dno;
        emailedit.value = email;
        snoEdit.value = e.target.id;
         
        // $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        // console.log("edit ");
        tr = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        
        a=e.target.id;
        console.log(a);
        
        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
           window.location = `/project/admin_welcome.php?delete=${a}`;
          // TODO: Create a form and use post request to submit a form

          
        }
        else {
          console.log("no");
        }
      })
    })

    
  </script>



        

  </body>
</html>