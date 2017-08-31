<?php

$duration = $_POST['period1'];
$mileage = $_POST['mileage1'];
$cashDeposit = $_POST['Cashdeposite'];
$brand = $_POST['Br_and'];
$model = $_POST['Mo_del'];
$variant = $_POST['Va_riant'];
$longitude = $_POST['Longitude'];
$latitude = $_POST['Latitude'];
$flag = $_POST['flag'];
ini_set("display_errors", 0);
require_once 'settings.php';
$sql = "select a.*, b.name as brand_name, c.name as model_name, d.name as variant_name from stats a "
        . "inner join trims d on d.id = a.trim "
        . "inner join models c on d.model = c.id "
        . "inner join brands b on b.id = c.brand "
        . "where a.trim = $variant and mileage = $mileage and period = $duration";

//print($sql);
        
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$row = mysqli_fetch_object($result);
$product = array(0=>array(
"Acceptancefee" =>	$row->acceptance_fee,
"Discount" =>	"3.382187",
"Id" =>	$row->id,
"OTPfee"	=> $row->otp_fee,
"Excessmileage"=>"6.98",
"Variant"=>$row->variant_name,
"Imagename"=>	$row->image_name,
"StockCarDescription"=>"",
"Capid"	=>"Audi",
"Displaymonth"=>	"36",
"Dislplaytradeindeposite"=>	null,
"Displaycashdeposite"=>$cashDeposit,
"Model"	=>$model,
"Model1"	=>$model,
"OTP"	=> $row->otr,
"APR"	=> $row->apr . "%",
"Rental"=>	"",
"Period"	=> $duration,
"Mileage"=>	$mileage,
"Cash_deposite"=>	$cashDeposit,
"Cashdeposite"	=> $row->cash_deposit,
"Emi"	=>"276.07",
"Doors"=>	"3",
"Fuel"	=>"Petrol",
"Engine"=>	"1.4",
"Transmission"=>	"Manual",
"Body"	=>"Hatchback",
"Balloon"=>	$row->optional_final,
"DC"	=>"750.0000",
"Dealercommission"=>	null,
"ROI"	=> $row->fixed_rate . "%",
"Amountfinancial"	=>"",
"IsSelected"=>	false,
"IsSelected1"=>	false,
"IsSelected2"=>	false,
"Financeproduct"=>	$row->finance_product,
"Feature_1"	=>$row->feature1,
"Feature_2"	=>$row->feature2,
"Feature_3"	=>$row->feature3,
"Feature_4"	=>$row->feature4,
"Feature_5"	=>$row->feature5,
"Feature_6"	=>$row->feature6,
"T_C"	=>$row->t_c,
"T_C1"	=>null,
"MobileNo"	=>"01908 308200",
"RetailerName"=>	"Milton Keynes Audi",
"PostCode"	=>"MK15 0DQ",
"DealerId"	=>"166",
"DealCode"	=>"",
"Datetimestampe"=>	null,
"SearchbycarOTPfee"=>	null,
"SearchbyDoors"	=>null,
"SearchbyBody"	=>null,
"SearchbyMillege"=>	null,
"CustomerDeposite"=>	"2217.5000",
"DealerName"	=>null,
"Distance"	=>"1.79909907626587",
"VehicleId"	=>"3019",
"I"	=>$row->i,
"F1"	=>"",
"F2"	=>"",
"F3"	=>"",
"M1"	=>"",
"M2"	=>"",
"T"=>	$row->t,
"T1"=>	"",
"Depositevalid"=>	$row->deposit_valid,
"Pmt"	=>"",
"Pmt1"	=>"",
"Interest"	=>$row->interest,
"Check1"	=> $row->check_val,
"TradeIndeposite"=>	$row->trade_in_deposit,
"CashDeposite"	=>$row->cash_deposit,
"Minddeposite"	=>$row->min_deposit,
"Maxddeposite"	=>$row->max_total_deposit,
"CashDeposite1"=>	$row->cash_deposit,
"RetailerPhone"	=>"01908 308200",
"OptionlFinal" => $row->optional_final,
"Discription"=>	"Milton Keynes Audi",
"PostCode"	=> "MK15 0DQ",
"RetailerId"=>	"166",
"Searchbycartotal_deposite"	=>null,
"Brand"	=>null,
"ReatialPrice"	=>null,
"DepositeValid"=>	null,
"TotalDeposite"	=>"",
"FirstStockId"	=>"11739",
"Miles1"	=>null,
"DepositeContribution"=>	$row->deposit_contribution,
"TotalAmountPayable"=>	null,
"TotalAmountCredit"	=>null
));

function calculatePriceForNonZeroAPR($customerDeposit, $depositContr, $otr, $i, $t, $optionalFinal, 
        $acceptanceFee, $otp) {
    global $product;
   $totalDeposit = $customerDeposit + $depositContr;
   $product[0]['TotalDeposite'] = $totalDeposit;
   $amountFinanced = $otr - $totalDeposit;
   $product[0]['Amountfinancial'] = $amountFinanced;
   $t1 = $t - 1;
   $product[0]['T1'] = $t1;
   $m1 = pow(1 + $i, $t);
   $product[0]['M1'] = $m1;
   $m2 = pow(1 + $i, $t - 1);
   $product[0]['M2'] = $m2;
   $f1 = $amountFinanced - ($optionalFinal / $m1) - ($acceptanceFee / (1 + $i)) - ($otp / $m1);
   $product[0]['F1'] = $f1;
   $f2 = 1 - (1 / $m2);
   $product[0]['F2'] = $f2;
   $f3 = $f2 / $i;
   $product[0]['F3'] = $f3;
   $pmt = number_format($f1 / $f3, 2);
   $product[0]['Pmt'] = $pmt;
   $product[0]['Emi'] = $pmt;
}

function calculatePriceForZeroAPR($customerDeposit, $depositContr, $otr, $period, $optionalFinal) {
    global $product;
   $totalDeposit = $customerDeposit + $depositContr;
   $product[0]['TotalDeposite'] = $totalDeposit;
   $monthlyRental = ($otr - $totalDeposit - $optionalFinal) / ($period - 1);
   $product[0]['Rental'] = $monthlyRental;
}

$apr = substr($product[0]['APR'], 0, strlen($product[0]['APR']) - 1);
$apr = (double) $apr;
if($apr <> 0) {
    calculatePriceForNonZeroAPR($cashDeposit, $product[0]['DepositeContribution'], 
        $product[0]['OTP'], $product[0]['I'], $product[0]['T'], $product[0]['Balloon'],
        $product[0]['Acceptancefee'], $product[0]['OTPfee']);
} else {
   calculatePriceForZeroAPR($cashDeposit, $product[0]['DepositeContribution'], $product[0]['OTP'], 
           $product[0]['Period'], $product[0]['Balloon']);
}
print(json_encode($product));


/*
 * 
create table stats(trim int, period int, mileage int, otr double, customer_deposit double, deposit_contribution double, optional_final double, rental double, apr double, fixed_rate double, excess_mileage double, otp_fee double, total_deposit double, amount_financed double, deposit_valid char(1), i double, t int, t1 int, m1 double, m2 double, f1 double, f2 double, f3 double, pmt double, interest double, check double, trade_in_deposit double, cash_deposit double, min_deposit double, max_total_deposit double, acceptance_fee double, image_name varchar(255), finance_product varchar(255), feature1 varchar(255), feature2 varchar(255), feature3 varchar(255), feature4 varchar(255), feature5 varchar(255), feature6 varchar(255), t_c text, PRIMARY KEY(trim, period, mileage));




 */