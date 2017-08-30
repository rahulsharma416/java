<?php
$model = $_POST['Model'];

require_once 'settings.php';
$sql = "select * from trims where model = $model";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$trims = array();
while($row = mysqli_fetch_object($result)) {
   $trims[] = $row;
}

print(json_encode($trims));