<?php
$duration = $_POST['period1'];
$mileage = $_POST['mileage1'];
$fromEmi = $_POST['Fromemi'];
$toEmi = $_POST['ToEmi'];
$cashDeposit = $_POST['Cashdeposite'];
$brand = $_POST['Br_and'];
$model = $_POST['Mo_del'];
$variant = $_POST['Va_riant'];
$longitude = $_POST['Longitude'];
$latitude = $_POST['Latitude'];
$flag = $_POST['flag'];

$allValsNew1 = $_POST['all_Valsnew1'];
$allValsNew2 = $_POST['all_Valsnew2'];
$allValsNew3 = $_POST['all_Valsnew3'];
$allValsNew4 = $_POST['all_Valsnew4'];
$fromPriceNew = $_POST['frompricenew'];
$toPriceNew = $_POST['topricenew'];
$fromEngine = $_POST['Engine_from'];
$toEngine = $_POST['Engine_to'];
$miles = $_POST['Miles'];
$nearestTown = $_POST['NearestTown'];
$countRecord = $_POST['_Countrecord'];

$products = array();

print(json_encode($products));