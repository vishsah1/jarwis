<html>
<button class="btn btn-primary" onclick="goBack()"><< Back</button>

<script>
    function goBack(){
    window.history.back();
    }
</script>
<head></head>
<body>
<header>
    <h1>Temperature Conversion</h1>
</header>
<form method="POST">
<div>
<input type="text" name="number" placeholder="Enter Digit">
<div>
<label>Celcius</label>
    <input type="radio" name="units" value="cel">
<label>Farehan</label>
    <input type="radio" name="units" value="frh">
</div>

    <input type="submit" name="submit" value="Convert Now">
</div>
</form>
<p>
    <?php
    if(isset($_POST['submit'])){
        $num = $_POST['number'];
        $temp = $_POST['units'];

        if($temp == "cel"){
            $result = $num * 9 / 5 + 32;
            echo "Temperature after getting conversion in Farehn is: " .$result;

         }elseif($temp == "frh"){
             $result = ($num-32) * 5 / 9;
            echo "Temperature after getting conversion in Cel is: " .$result;  
            }
    }

    ?>
</p>

</body>
</html>