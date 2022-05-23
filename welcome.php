    <?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true ){
        header("location: login.php");
        exit;
    }

    $currentuser = $_SESSION['username'];
    $pass = $_SESSION['password'];
    $server ="localhost";
    $username = "root";
    $password = "prabhakar@erp";
    $db = "Registration";

    $con = mysqli_connect($server,$username,$password,$db);

    if(!$con){
        die("connection to database failed due to" .mysqli_connect_error());
    }   

    $sqla = "SELECT * FROM register where Usertype = 'ADMIN' AND UserName = '$currentuser'";
    $resulta = mysqli_query($con,$sqla);
    $numa = mysqli_num_rows($resulta);

    $admin =false; 

    if($numa==1){
        header("location: admin.php");
        $admin = true;

        
    }

    $sql = "SELECT * FROM register where UserName = '$currentuser'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);


    if($num == 1){
        $row= mysqli_fetch_assoc($result);
        $fn=$row['FirstName'];
        $ln=$row['LastName'];
        $em=$row['Email'];
        $usern=$row['UserName'];
        $passs = $row['Password'];
        // echo $passs;
        // echo "<br>";
        // echo $pass;
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

        <title>Welcome! <?php echo $_SESSION['username']?>
    </title>
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
              <!-- <li class="nav-item">
                <a class="nav-link " aria-current="page" href="signup.php">Signup</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/login.php">Login</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link " href="/logout.php">Logout</a>
              </li>
              
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      
      <!-- <table class ="table">
      <tr>
              
              <th>S.No.</th>
              
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
              <th>Username</th>
            </tr> -->
                
            
            
            <?php
            
        // $sql = "SELECT  `Sr.` , FirstName, LastName, Email, UserName FROM register ";
        
        // $result = mysqli_query($con, $sql);
        // $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // foreach ($rows as $row) {
        //     //   printf("%s  %s  %s  (%s)\n", $row["FirstName"], $row["LastName"], $row["Email"], $row["UserName"]);
        //     //   echo "<br>";
        //     // echo (" <h3> FirstName: {$row['FirstName']}        {$row['LastName']}              {$row["Email"]}                  {$row["UserName"]}  </h3>  " ) ;
            
        //     echo "<tr>  <td>" . $row['Sr.'] . "</td>   <td>" . $row['FirstName'] . "</td> <td>" . $row['LastName'] . "</td>  <td>" . $row["Email"] . "</td> <td>" . $row["UserName"] . "</td>            </tr>" ;
        // }

?>
 
<!-- </table> -->



      <h1 style="text-align: center">Welcome! <?php echo $_SESSION['username']?></h1>
      <hr>
      <h3 style="text-align: center">First Name: <?php echo $fn?></h3>
      <h3 style="text-align: center">UserName: <?php echo $currentuser?></h3>
      <h3 style="text-align: center">Last Name:<?php echo $ln?></h3>
      <h3 style="text-align: center">Email:<?php echo $em?></h3>

      <?php
      // echo $pass;

      // if(password_verify($pass ,$passs)){
      //   echo "assword is valid";
      // }
      // else{
      //   echo "password is not valid";
      // }

      ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
     </body>
</html>