
<?php
session_start();
include_once 'conn.php';

if(!isset($_SESSION['userid'])){
    header('location: home.php');
}else{
    $email = $_SESSION['userid'];

    $sql = "SELECT * from `userdata` WHERE email = '$email'";
    $result = mysqli_query($connect,$sql);
    $rows = mysqli_fetch_assoc($result);

    if($rows){
        $name = $rows['name'];
    }
}

if(isset($_POST['contact_us'])){

$to_mail = "vishsah.php@gmail.com";
$subject = $_POST['subject'];
$body = $_POST['message'];
$header = $rows['email'];


    if(mail($to_mail, $subject, $body, $header)){
        ?>
            <script>
            alert("mail sent to ".$to_mail);
            </script>
        <?php
    }else{
        echo "not sent";
    }
}

?>

<html>
<head><title>Feel free reach us...</title></head>
<body>
<form method="POST">
<div class="mainDiv">
    <div>
        Name: <input type="text" name="username" value="<?php echo $rows['name']?>" >
    </div>
    <div>
        Email: <input type="text" name="from" value="<?php echo $rows['email']?>" >
    </div>
    <div>
        Subject: <input type="text" name="subject" >
    </div>
    <div>
        Message<textarea name="message" ></textarea>
    </div>
    <div>
        <input type="submit" name="contact_us" value="Send" >
    </div>

</div>

</form>

    
</body>
</html>