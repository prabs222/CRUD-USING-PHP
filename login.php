<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // echo("HEllo");
    
    $server ="localhost";
    $username = "root";
    $password = "prabhakar@erp";
    $db = "Registration";
    
    $conn = mysqli_connect($server,$username,$password,$db);
    
    if(!$conn){
        die("connection to database failed due to" .mysqli_connect_error());
    }   
    // echo "roooo";

    $username = $_POST['username'];
   $pass = $_POST['password'];
   
  //  $pass=password_hash("$pass", PASSWORD_DEFAULT);

  // if(password_verify($pass ,$passs)){
  //   echo "assword is valid";
  // }
  // else{
  //   echo "password is not valid";
  // }

  



   $sql = "SELECT * from register where UserName ='$username'";

  //  if(password_verify($pass,))
   // if($conn->query($sql) == true){
       // $showalert = true;
       // echo "Succesfully Inserted";
       // } 
    //    $result = $conn -> query($sql);
       $result = mysqli_query($conn, $sql);
       $num = mysqli_num_rows($result);
       $row= mysqli_fetch_assoc($result);
        $fn=$row['Password'];


      if(password_verify($pass ,$fn)){
        echo "Password is valid";
        if($num == 1){
          $login = true;
          echo "great";
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $pass;
          header("location: welcome.php");
      }
      else{
       echo ('<script>alert("INVALID CREDENTIALS!!")</script>');
       echo ('<script>history.go(-1)</script>');
       die();
       }

      }
      else{
        echo ('<script>alert("INVALID CREDENTIALS!!")</script>');
       echo ('<script>history.go(-1)</script>');
       die();
      }

      //  echo $result;

    //    if($result){
    //        echo "HELLO";
    //    }
       



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

    <title>Login Page</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/signup.php">Registration System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="signup.php">SIGN UP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/login.php">LOGIN</a>
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
//  if($showalert == true){
// echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
// <strong>HELLO!</strong> WELCOME TO REGISTRATION PAGE!!
// <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';}

     if($login){

         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success!</strong> You have successfully logged in!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }

        if($showerrs){

            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!</strong> '. $showerror .' !!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
           }
?>
    <h1 style="text-align: center;">Login Page</h1>
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
                <label for="username" class="col-sm-2 col-form-label">Username:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" required name="username">
                  <span class="error">* <?php echo $usernameErr;?></span>
                </div>
              </div>
            <div class="row mb-3">
              <label for="password" class="col-sm-2 col-form-label">Password:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control"  name="password" required>
                <span class="error">* <?php echo $passErr;?></span>
              </div>
            </div>       
            
            <button type="submit" name="submit" style="text-align: center; margin-left: 48%;" class="btn btn-danger">REGISTER!!!</button>
          </form>
    </div>  
  </body>
</html>