<?php include 'links.php';?>

<h3 class="text-center text-uppercase">COVID-19 LIVE UPDATES OF THE INDIA</h3>        

<button class="btn btn-primary" onclick="goBack()"><< Back</button>
<script>
    function goBack(){
    window.history.back();
    }
</script>
<div class="table-responsive">
<table class="table table-bordered table-striped text-center">
    <tr>
        <th>Last Updated Time</th>
        <th>State/UT</th>
        <th>Confirmed</th>
        <th>Active</th>
        <th>Recovered</th>
        <th>Decreased</th>
    </tr>

<?php
$data = file_get_contents('https://api.covid19india.org/data.json');
$decode = json_decode($data, true); //true - to to convert in associative array


$statecount = count($decode['statewise']);
// echo $decode['statewise'][25]['state'];

// echo "<pre>";
// print_r($decode);
// echo "</pre>";

$i=1;
while($i < $statecount){

    ?>
    <tr>
    <td><?php echo $decode['statewise'][$i]['lastupdatedtime'] ?></td>
    <td><?php echo $decode['statewise'][$i]['state'] ?></td>
    <td><?php echo $decode['statewise'][$i]['confirmed']?></td>
    <td><?php echo $decode['statewise'][$i]['active']?></td>
    <td><?php echo $decode['statewise'][$i]['recovered']?></td>
    <td><?php echo $decode['statewise'][$i]['deaths']?></td>

    </tr>
    <!-- echo $decode['statewise'][$i]['lastupdatedtime']."<br>";
    echo $decode['statewise'][$i]['state']."<br>";
    echo $decode['statewise'][$i]['confirmed']."<br>";
    echo $decode['statewise'][$i]['active']."<br>";
    echo $decode['statewise'][$i]['deaths']."<br>"; -->
    <?php
    $i++;
}
?>
</table>
</div>