<?php 
    session_start();
    include_once 'conn.php';
    include_once 'header.php';
    include 'links.php';

    if(isset($_POST['save'])){

        if(isset($_POST['email'])){
            $email = $_POST['email'];

        }

        $_SESSION['email'] = $email;
        $name = $_POST['name'];
        $address = $_POST['add'];

            if(isset($_POST['gender']));{
                $gender_selected = $_POST['gender'];
            if($gender_selected == 'male'){
                $male_select = 'checked';
            }elseif($gender_selected == 'female'){
                $female_select = 'checked';
            }elseif($gender_selected == 'middle'){
            $not_select = 'checked';
            }
        }
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        //$secure_passpord = password_hash($password,PASSWORD_BCRYPT);
        $secure_passpord = md5($password);

    
        $fetch = "SELECT * FROM `userdata` WHERE email = '$email' ";
        $result = mysqli_query($connect,$fetch);
        $row = mysqli_num_rows($result);

        if($row>0){
            echo "data exista";
        }else{

                $insert = "INSERT INTO `userdata`(`name`, `email`, `address`, `gender`, `mobile`, `password`) 
                VALUES ('$name','$email','$address','$gender_selected','$mobile','$secure_passpord')";

                $res = mysqli_query($connect,$insert);
                if($res){
                    ?>
                        <script>
                            alert("Inserted");
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert("Not Inserted");
                        </script>
                    <?php 
                }
                header('location:login.php');
        }
        
    }
?>

    <div class="container">
    <button class="btn btn-primary" onclick="goBack()"><< Back</button>

    <script>
        function goBack(){
        window.history.back();
        }
    </script>
    <h1>Register youself for Jarwis</h1>
        <p>Free to register...</p>
    
            <form method="POST">
                <div>
                    <input type="text" name="name" placeholder="Enter Full Name"></br>
                </div>
                <div>
                    <input type="text" name="email" placeholder="Enter Email Id">
                </div>
                <div>                                    
                    <input type="text" name="add" placeholder="Enter Address">
                </div>
                <div>
                    <label>Gender:-</label></break>
                    <input type="radio" name="gender" value="male"> Male <break>
                    <input type="radio" name="gender" value="female"> Female <break>
                    <input type="radio" name="gender" value="middle"> Not Specefied <break>
                </div>

                <div>
                    <input type="text" name="mobile" placeholder="Enter Contact No.">
                </div>
                <div>
                    <input type="password" name="password" placeholder="*********">
                </div>                
                <div>
                    <input type="submit" name="save" value="Save " class="btn btn-primary">
                </div>

                <p>Already a member?<a href="login.php"> Log In</a></p>

            </form>
            
        </div>

        <?php include('footer.php'); ?>
    