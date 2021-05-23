<html>
<button class="btn btn-primary" onclick="goBack()"><< Back</button>

<script>
    function goBack(){
    window.history.back();
    }
</script>
<head>
<p>Simple Calculator</p>
</head>
<body>
    <form method="POST">
        <div class="form-group">
        <br/>
         <input type="text" name="firstDigit" placeholder="FIRST DIGIT">
        </div>
        
        <div class="form-group">
        <br/>
        <input type="text" name="secondDigit" placeholder="SECOND DIGIT">
        </div>
        
        <div>
        <br/>
        <select name="operator"><br/>
            <option value="add">ADD</option>
            <option value="sub">SUB</option>
            <option value="mult">MULTIPLY</option>
            <option value="div">DIVIDE</option>
        </select>
        </div>
        <div>
        <br/>
        <input type="submit" name="submit" value="Calculate">
        </div>
    </form>
        <p>
            <?php

            if(isset($_POST['submit'])){
                $first = $_POST['firstDigit'];
                $second = $_POST['secondDigit'];
                $operator = $_POST['operator'];
                // echo $first.$second.$operator;

                switch($operator){

                    case "add" :$sum = $first +$second;
                        echo "The addition of two number is $sum";
                        break;
                    case "sub" :$sub = $first - $second;
                        echo "The subtraction of two number is $sub";
                        break;
                    case "mult" :$mult = $first * $second;
                        echo "The multiplication of two number is $mult";
                        break;
                    case "div" :$div = $first / $second;
                        echo "The division of two number is $div";
                        break;

                        default: echo "Not valid";
                }
            }
            echo str_ireplace("hi","SAH","vish hi");
            // echo $s;
            ?>
        </p>

</body>
</html>