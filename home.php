<?php
session_start();
include_once 'header.php';
include_once 'conn.php';

 include('links.php'); 


if (!isset($_SESSION['userid'])){
    header('Location: login.php');
    }else{
        $email = $_SESSION['userid'];

        $sql = "SELECT * FROM `userdata` WHERE email = '$email' ";
        $result = mysqli_query($connect,$sql);
    
        $rows  = mysqli_fetch_assoc($result);

    if($rows){

        $name = $rows['name'];
        $email = $rows['email'];
        // $qualification = $rows['qualification'];
        // $gender = $rows['gender'];
        // $hobbies = $rows['hobbies'];
        // $dob = $rows['dob'];
        // $image = $rows['image'];
        }
    }
?>

<html>
<div class="container">
<header><h1>Welcome to Jarwis Home Page...... <?php echo $name; ?></h1></header>
</div>
<body>

<form method="POST">

<input type="button" onclick="window.location='covid19india.php'" name="detail" value="COVID-19" class="btn btn-primary"><br><br>


<input type="button" onclick="window.location='calculator.php'" class="btn btn-primary" value="Calculator" size="34"><br><br>

<input type="button" onclick="window.location='temperatureConversion.php'" class="btn btn-primary" value="Temperature Conversion"><br><br>

<input type="button" onclick="window.location='viewProfile.php'" name="detail" value="Total Users" class="btn btn-primary"><br><br>


<input type="button" onclick="window.location='contact_us.php'" class="btn btn-primary" value="Contact Us"><br><br>


<div class="btn btn-primary">
    <a href="logout.php">Log Out</a>
</div>

<!-- <p><a href="calculator.php"> calculator</a> </P><br>
<p><a href="temperatureConversion.php"> Temperature Conversion</a> </P><br> -->

</form>
</body>
</html>


<?php include('footer.php'); ?>