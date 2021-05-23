<?php 
    session_start();
    include_once 'conn.php';
    include_once 'header.php';

    $ids = $_GET['id'];

       $delete = "DELETE FROM `userdata` WHERE ID = $ids";
        
        $res = mysqli_query($connect,$delete);


                if($res){
                    ?>
                        <script>
                            alert("Deleted");
                        </script>
                        
                    <?php
                }else{
                    ?>
                        <script>
                            alert("Error");
                        </script>
                    <?php 
                }
                
                header('location:viewProfile.php');     
        ?>
