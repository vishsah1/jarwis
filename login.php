<?php
session_start();
include_once 'conn.php';
include_once 'header.php';
include 'links.php';

if(isset($_POST['login'])){
    $user_id = $_POST['userId'];
    $pass = $_POST['userPassword'];

    $_SESSION["userid"] = "$user_id";

    $decrypt_password = md5($pass);

    $checklogin = "SELECT * FROM `userdata` WHERE email='".$user_id."' and password='".$decrypt_password."' ";
    
    $che_result = mysqli_query($connect,$checklogin);
    $rowcount=mysqli_num_rows($che_result);


    if($rowcount > 0){

        if(isset($_POST['rememberme'])){
        header('location: home.php');

        setcookie("emailcookie", $user_id,time()+86400);
        setcookie("passwordcookie", $pass,time()+86400);
        }else{
        header('location: home.php');

        }
    }else{
        echo "Invalid UserId or Password"; 
    }   
}
?>

<div class="container">
  <h1>Login to Jarwis homePage</h1>
  <p>Free to register...</p>
</div>

<div class="row d-flex justify-content-center " >
<form method="POST" action="">

    <div>
        <input type="text" name="userId" placeholder="User Name/E-Mail/Number" 
        value="<?php if(isset($_COOKIE['emailcookie'])){echo $_COOKIE['emailcookie'];}?>" required></break>
    </div>
    <div>
        <input type="password" name="userPassword" placeholder="Password****"
        value="<?php if(isset($_COOKIE['passwordcookie'])){echo $_COOKIE['passcookie'];}?>" required></break>

    </div>
    <div>
    <input type="checkbox" name="rememberme" >Remember Me</break>
    </div>

    <input type="submit" name="login" class="btn btn-primary" value="LogIn">

    <p> New User? <a href="register.php"> Click to Register</a><p>
    <p> Forgot Password? <a href="resetPassword.php">Reset Your Password</a><p>

</form>

</div>



<?php include('footer.php')?>