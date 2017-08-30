<?php
$brand = $_POST['Brand'];

require_once 'settings.php';
$sql = "select * from models where brand = $brand";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$models = array();
while($row = mysqli_fetch_object($result)) {
   $models[] = $row;
}

echo json_encode($models);