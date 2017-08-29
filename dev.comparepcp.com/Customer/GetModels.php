<?php
$brand = $_POST['Brand'];

$models = array('A1'/*, 'A3', 'A3 Saloon', 'A3 Sportback', 'A4 Avant', 'A4 Saloon', 'A5 Cabriolet', 'A5 Coupe',
    'A5 Sportback', 'A6 Avant', 'A6 Quattro', 'A6 Saloon', 'A7', 'Q3', 'Q7', 'S1', 'S1 Sportback', 'S6 Saloon', 'S7', 
    'TT'*/);

echo json_encode($models);