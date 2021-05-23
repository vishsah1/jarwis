<?php 
    session_start();
    include_once 'conn.php';
    include_once 'header.php';
    include 'links.php';

    $ids = $_GET['id'];

    $show_query = "select * from userdata where ID = {$ids}";

    $show_data = mysqli_query($connect,$show_query);

    $arr_data = mysqli_fetch_array($show_data);

    if(isset($_POST['update'])){

        $ids_update = $_GET['id'];

        $email = $_POST['email'];
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
        // $password = $_POST['password'];

    
        // $fetch = "SELECT * FROM `userdata` WHERE email = '$email' ";
        // $result = mysqli_query($connect,$fetch);
        // $row = mysqli_num_rows($result);

        // if($row>0){
        //     echo "data exista";
        // }else{

                $delete = "DELETE FROM `userdata` WHERE ID = $ids";
                // $insert = "INSERT INTO `userdata`(`name`, `email`, `address`, `gender`, `mobile`, `password`) 
                // VALUES ('$name','$email','$address','$gender_selected','$mobile','$password')";

                $update = "UPDATE `userdata` SET `name`='$name',`email`='$email',`address`='$address',
                `gender`='$gender_selected',`mobile`='$mobile' WHERE ID = $ids_update ";

                echo $update;

                $res = mysqli_query($connect,$update);


                if($res){
                    ?>
                        <script>
                            alert("Updated");
                        </script>
                        
                    <?php
                }else{
                    ?>
                        <script>
                            alert("Not Updated");
                        </script>
                    <?php 
                }
                
                header('location: viewProfile.php');     
        }
        
    // }
?>

    <div class="container">
    <button class="btn btn-primary" onclick="goBack()"><< Back</button>

<script>
    function goBack(){
    window.history.back();
    }
</script>
    <h1>Jarwis Update Page..</h1>
        <p>Feel free to update....</p>
    
            <form method="POST">
                <div>
                    <input type="text" name="name" value="<?php echo $arr_data['name']; ?>" placeholder="Enter Full Name"></br>
                </div>
                <div>
                    <input type="text" name="email" value="<?php echo $arr_data['email']; ?>" placeholder="Enter Email Id">
                </div>
                <div>                                    
                    <input type="text" name="add" value="<?php echo $arr_data['address']; ?>" placeholder="Enter Address">
                </div>
                <div>
                    <label>Gender:-</label></break>
                    <input type="radio" name="gender" value="male"> Male <break>
                    <input type="radio" name="gender" value="female"> Female <break>
                    <input type="radio" name="gender" value="middle"> Not Specefied <break>
                </div>

                <div>
                    <input type="text" name="mobile" value="<?php echo $arr_data['mobile']; ?>" placeholder="Enter Contact No.">
                </div>
                <!-- <div>
                    <input type="password" name="password" placeholder="*********">
                </div>                 -->
                <div>
                    <input type="submit" name="update" value="UPDATE " class="btn btn-primary">
                </div>

                <p>Already a member?<a href="login.php"> Log In</a></p>

            </form>
            
        </div>

        <?php include('footer.php'); ?>
    