
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

 // login form



 if ($_SERVER['REQUEST_METHOD']=='POST'){
  // if (isset($_POST['email1']) && isset($_POST['password1'])) 
    $email1 = $_POST['email1'];
    $password1 = $_POST['password1'];
    
    
    $_SESSION['loggedin']=FALSE;
   
    

    // $email1=$_POST['email1'];
    // $password1=$_POST['password1'];

    
    $sql="SELECT * from forum_login_table Where `email`='$email1'";
    $res=mysqli_query($connect,$sql);
   
    $num=mysqli_num_rows($res);
    if($num>0){
      // echo "entered in logic of num>0";
        while($rows=mysqli_fetch_assoc($res)){
      // echo "entered in logic of while loop";
      // $hash=password_hash($password,PASSWORD_DEFAULT);
      // echo "$hash";
      // echo '<br>';
      // echo $rows['password'];
      // echo '<br>';
            $username=$rows['username'];
      

            if(password_verify($password1,$rows['password'])){

                echo "login was successful";
               session_start();
               $_SESSION['loggedin']=TRUE;
               $_SESSION['username']=$username;
               header("location: /gaming_project/GAMING_ROCKETS/rocket.html");
            }
            else{
               echo '<div class="alert alert-danger" role="alert">
               Failed! Invalid Credentials
             </div>';
           }

        }
    }
   
// else {
//       echo "Email and/or password not provided in the POST request.";
//   }


 }?>

<div class="wrapper">
         <div class="title">
            Login 
         </div>
         <form action="login.php" method="post">

            <div class="field">
               <input type="text" name="email1" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="password1" required>
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
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="signup.php">Signup now</a>
            </div>
         </form>
      </div>




<!-- Modal -->
<!-- // <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
//   <div class="modal-dialog">
//     <div class="modal-content">
//       <div class="modal-header">
//         <h1 class="modal-title fs-5" id="exampleModalLabel">Login to your account</h1>
//         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
//       </div>
//       <div class="modal-body">
//       <form action="/full project php/index.php" method="POST">
//   <div class="mb-3">
//     <label for="email" class="form-label">Email address</label>
//     <input type="email" class="form-control" id="email" name="email1" aria-describedby="emailHelp">
//   </div>
//   <div class="mb-3">
//     <label for="password" class="form-label">Password</label>
//     <input type="password" class="form-control" id="password" name="password1">
//   </div>
//   <button type="submit" class="btn btn-primary">Login</button>
// </form>  



//       </div>
//       <div class="modal-footer">
//         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
//       </div>
//     </div>
//   </div>
// </div>
    -->
   
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
