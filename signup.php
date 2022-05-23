<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
// echo("HEllo");

$server ="localhost";
$username = "root";
$password = "prabhakar@erp";
$db = "Registration";

$con = mysqli_connect($server,$username,$password,$db);

if(!$con){
    die("connection to database failed due to" .mysqli_connect_error());
}   
    // echo("congratulations connection established");
    $showalert = false;
    $showerrs = false;
    $showexist = false;
    $fname = $lname =$email = $username = $pass = $cpass = "";
    // if(empty($_POST['fname'])){
    //     echo ("<script>")
    // }
    // $fname = $_POST['fname'];
    // $lname = $_POST['lname'];
    // $email = $_POST['email'];
    // $username = $_POST['username'];
    // $pass = $_POST['password'];
    // $cpass = $_POST['cpassword'];





    if(empty($_POST["fname"])){
        // $fnameErr = "First Name is required.";
        echo "<script>alert('First Name is required');</script>";
        echo ('<script>history.go(-1)</script>');
    die();

        // exit;
      }
      else{
        $fname = $_POST['fname'];
      }
      if(empty($_POST["lname"])){
        // $lnameErr = "Last Name is required"; 
        echo "<script>alert('last name is required');</script>";
        echo ('<script>history.go(-1)</script>');
    die();
        // exit;
      }
      else{
        $lname = $_POST["lname"];
      }
      if(empty($_POST['email'])){
        // $emailErr = "Email is required";
        echo "<script>alert('email is required');</script>";
        echo ('<script>history.go(-1)</script>');
    die();
        // exit;
      }
      else{
        $email = $_POST['email'];
      }
      if(empty($_POST['username'])){
        // $usernameErr = "Username is required";
        echo "<script>alert('username is required');</script>";
        echo ('<script>history.go(-1)</script>');
    die();
        // exit;
      }
      else{
        $username = $_POST['username'];
      }
      if(empty($_POST['password'])){
        // $passErr = "Password is required";
        echo "<script>alert('password is required');</script>";
        echo ('<script>history.go(-1)</script>');
    die();
        // exit;
      }
      else{
        $pass = $_POST['password'];
      }
      if(empty($_POST['cpassword'])){
        // $cpassErr = "Confirm Password is required";
        echo "<script>alert('confirm password is required ');</script>";
        echo ('<script>history.go(-1)</script>');
    die();
        // exit;
      }
      else{
        $cpass = $_POST['cpassword'];
    }

    //  if(empty($_POST['phone'])){
    //     // $phoneErr = "Phone is required";
    //     echo "<script>alert('$pphoneErr');</script>";
    //     echo ('<script>history.go(-1)</script>');
    // die();
    //     // exit;
    //   }
    //   else{
    //     $phone = test_input($_POST['phone']);
    //   }

    //   function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    //   }
    $sqlexist = "SELECT * FROM `register` WHERE UserName ='$username' ";
    $result = mysqli_query($con, $sqlexist);
    $num = mysqli_num_rows($result);
    if($num > 0)
    {
        // echo "user already exists";
        $showexist=true;
    //     echo ('<script>alert("user exist ")</script>');
    // echo ('<script>history.go(-1)</script>');
    // die();
    }
    else{
    if($pass ==  $cpass){
        $pass=password_hash("$pass", PASSWORD_DEFAULT);

        $sql = "INSERT INTO `register` (`FirstName`, `LastName`, `Email`, `UserName`, `Password`, `ConfirmPassword` ) VALUES ('$fname', '$lname', '$email', '$username', '$pass', '$cpass' )"; 
        
        // echo $sql;
        
        // $result = mysqli_query($con,$sql);
        
        if($con->query($sql) == true){
            $showalert = true;
            // echo "Succesfully Inserted";
        } 
        
        else{
            echo "ERROR: <br> $con->error ";
        }   
    }
    else{
        $showerrs = true;
    $showerror = "password do not match";
    echo ('<script>alert("Password Do Not Match ")</script>');
    echo ('<script>history.go(-1)</script>');
    die();
     
    }
  }
    }
   
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registration Form</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Registration System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">SIGN UP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login.php">LOGIN</a>
              </li>
              
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      
     <?php 
 if($showexist){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>HELLO!</strong> USER ALREADY EXISTS!! CLICK HERE TO LOGIN<a href="login.php">LOGIN HERE!!!!!</a>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}

     if($showalert){

         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success!</strong> You have successfully been registered!!
         <a href="login.php">LOGIN HERE!!!!!</a>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }

        // if($showerrs){

        //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //     <strong>ERROR!</strong> '. $showerror .' !!
        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //     </div>';
        //    }
?>
    <h1 style="text-align: center;">Registration Form</h1>
    <hr>
      
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <div class="container">
        <form method="post" >
            <div class="row mb-3">
                <label for="fname" class="col-sm-2 col-form-label">First Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter your First Name" name="fname" >
                  <span class="error">* <?php echo $fnameErr;?></span>
                </div>
              </div>
              <div class="row mb-3">
                <label for="lname" class="col-sm-2 col-form-label">Last Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Enter your Last Name" name="lname" >
                  <span class="error">* <?php echo $lnameErr;?></span>
                </div>
              </div>
            <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control"placeholder="Enter your Email Address "  name="email" >
                <span class="error">* <?php echo $emailErr;?></span>
              </div>
            </div>
            <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"placeholder="Enter your username"  name="username">
                  <span class="error">* <?php echo $usernameErr;?></span>
                </div>
              </div>
            <div class="row mb-3">
              <label for="password" class="col-sm-2 col-form-label">Password:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Enter your password" name="password" >
                <span class="error">* <?php echo $passErr;?></span>
              </div>
            </div>
            <div class="row mb-3">
                <label for="cpassword" class="col-sm-2 col-form-label">Confirm Password:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" placeholder="Rewrite your password..." name="cpassword" >
                  <span class="error">* <?php echo $cpassErr;?></span>
                </div>
              </div>
            <!-- <div class="row mb-3">
              <label for="phone" class="col-sm-2 col-form-label">Phone Number:</label>
              <div class="col-sm-10">
                <input type="text"  class="form-control" name="phone" >
              </div>
             </div> -->
           
            
            <button type="submit" name="submit" style="text-align: center; margin-left: 48%;" class="btn btn-danger">REGISTER!!!</button>
          </form>
    </div>  
  </body>
</html>