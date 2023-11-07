<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dissc-Coding  Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

  <?php
 require "db_connect.php";
 $result='something';
 
 if ($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $pass_hash=password_hash($password,PASSWORD_DEFAULT);
   
    $sql="INSERT INTO forum_login_table (`username`,`email`, `password`) VALUES('$username','$email','$pass_hash') ";
    $result = mysqli_query($connect,$sql);
    if ($result){
      echo '<div class="alert alert-success" role="alert">
          Success! Your Signup was successful<br>Please Login Now
        </div>';
    }
    else{
      echo '<div class="alert alert-danger" role="alert">
      Failed! Due to server Error || Please try again after sometime
    </div>';
    }


 }
 
 
 
 ?>


<?php
  echo'
 

      <div class="wrapper">
         <div class="title">
            Sign Up
         </div>
         <form action="signup.php" method="post">
         <div class="field">
               <input type="text" name="username" Placeholder="Enter your name" required>
               <label>Username</label>
            </div>
            <div class="field">
               <input type="text" name="email" Placeholder="Enter your Email" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="password" Placeholder="Enter your Password" required>
               <label>Password</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="SignUp">
            </div>
            <div class="signup-link">
               <a href="login.php">Login Now</a>
            </div>
         </form>
      </div>
   ';





   ?>

  <!-- <?php
 require "db_connect.php";
 $result='something';
 
 if ($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $pass_hash=password_hash($password,PASSWORD_DEFAULT);
   
    $sql="INSERT INTO forum_login_table (`email`, `password`) VALUES('$email','$pass_hash') ";
    $result = mysqli_query($connect,$sql);


 }
 
 
 
 ?>

<!--  Modal  -->
<div class="modal fade" id="signupexampleModal" tabindex="-1" aria-labelledby="signupexampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signupexampleModalLabel">Signup With Us</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
    if($result){
        echo'
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> Your account is created successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else{
    echo'
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Failed!</strong> Due to Server Error your account was not created .
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>



      <form action="/full project php/index.php" method="post"> 
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" >
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
