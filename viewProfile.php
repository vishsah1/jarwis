<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
   
</head>

<body>
    <div class="main">
        <h1>List of all visitors</h1>

        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Addresss</th>
                            <th>Gender</th>
                            <th>Contact No.</th>
                            <th colspan="2">Operation</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php



                        session_start();
                        include_once 'header.php';
                        include_once 'conn.php';

                        $select_Query = " SELECT * FROM `userdata` ";
                        $fetch = mysqli_query($connect, $select_Query);

                        $rows = mysqli_num_rows($fetch);


                        
                        while ($res = mysqli_fetch_array($fetch)) {

                        ?>
                            <tr>
                                <td><?php echo $res['ID']; ?></td>
                                <td><?php echo $res['name']; ?></td>
                                <td><span class="email-style"><?php echo $res['email']; ?></span></td>
                                <td><?php echo $res['address']; ?></td>
                                <td><?php echo $res['gender']; ?></td>
                                <td><?php echo $res['mobile']; ?></td>
                                <!-- <td><?php echo $res['name']; ?></td> -->
                                <td><a href="updates.php?id=<?php echo $res['ID']; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="UPDATE">
                                    edit</a></td>
                                <td><a href="delete.php?id=<?php echo $res['ID']?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="DELETE">
                                    Delete</a></td>
                                    <!-- <i class="fab fa-trash"></i> -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
         <script>
           $(document).ready(function() {
           $('[data-toggle="tooltip"]').tooltip();
          });
        </script>



        <button class="btn btn-primary" onclick="goBack()"><< Back</button>

        <script>
            function goBack(){
            window.history.back();
            }
        </script>
</body>

</html>