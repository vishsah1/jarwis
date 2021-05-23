<?php
// Create Connection

$connect = mysqli_connect('localhost','root', 'vish123', 'helpdesk');

if($connect){
    echo "Connection Sucessful";
    ?>
        <!-- <script>
        alert('Connection Sucessful');
        </script> -->
    <?php
}else{
    die('failed to connect' . mysqli_connect_error());
}

?>