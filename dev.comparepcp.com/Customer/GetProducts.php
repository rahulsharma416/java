<?php
$rental = $_POST['rental'];
$otr = $_POST['otr'];
$cashDeposit = $_POST['cashDeposit'];
require_once 'settings.php';

function calculatePriceForNonZeroAPR($product, $customerDeposit, $depositContr, $otr, $i, $t, $optionalFinal, 
        $acceptanceFee, $otp) {
   $totalDeposit = $customerDeposit + $depositContr;
   $product['total_deposit'] = $totalDeposit;
   $amountFinanced = $otr - $totalDeposit;
   $product['amount_financed'] = $amountFinanced;
   $t1 = $t - 1;
   $product['t1'] = $t1;
   $m1 = pow(1 + $i, $t);
   $product['m1'] = $m1;
   $m2 = pow(1 + $i, $t - 1);
   $product['m2'] = $m2;
   $f1 = $amountFinanced - ($optionalFinal / $m1) - ($acceptanceFee / (1 + $i)) - ($otp / $m1);
   $product['f1'] = $f1;
   $f2 = 1 - (1 / $m2);
   $product['f2'] = $f2;
   $f3 = $f2 / $i;
   $product['f3'] = $f3;
   $pmt = number_format($f1 / $f3, 2);
   $product['pmt'] = $pmt;
   $product['emi'] = $pmt;
   $product['rental'] = $pmt;
   return $product;
}

function calculatePriceForZeroAPR($product, $customerDeposit, $depositContr, $otr, $period, $optionalFinal) {
   $totalDeposit = $customerDeposit + $depositContr;
   $product['total_deposit'] = $totalDeposit;
   $monthlyRental = ($otr - $totalDeposit - $optionalFinal) / ($period - 1);
   $product['rental'] = $monthlyRental;
   return $product;
}

$sql = "select a.otr - $otr as score2, a.*, b.name as brand_name, c.name as model_name, d.name as variant_name from stats a "
        . "inner join trims d on d.id = a.trim "
        . "inner join models c on d.model = c.id "
        . "inner join brands b on b.id = c.brand "
        . "where a.otr - $otr > 0";

$products = array();
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
while($product = mysqli_fetch_array($result)) {
    if($product['apr'] <> 0)
        $product = calculatePriceForNonZeroAPR($product, $cashDeposit, $product['deposit_contribution'], 
        $product['otr'], $product['i'], $product['t'], $product['optional_final'],
        $product['acceptance_fee'], $product['otp_fee']);
    else if($product['apr'] == 0)
        $product = calculatePriceForZeroAPR($product, $cashDeposit, $product['deposit_contribution'], 
                $product['otr'], $product['period'], $product['optional_final']);
    if($score1 = $rental - $product['rental'] > 0) {
        $sumOfScores = $score1 + $product['score2'];
        $products[$sumOfScores] = array(
            "Acceptancefee" =>	$product['acceptance_fee'],
            "Discount" =>	"3.382187",
            "Id" =>	"1318",
            "OTPfee"	=> $product['otp_fee'],
            "Excessmileage"=>$product['excess_mileage'],
            "Variant"=>$product['variant_name'],
            "Imagename"=>	$product['image_name'],
            "StockCarDescription"=>"",
            "Capid"	=>"Audi",
            "Displaymonth"=>	"36",
            "Dislplaytradeindeposite"=>	null,
            "Displaycashdeposite"=>$cashDeposit,
            "Model"	=>$product['model_name'],
            "Model1"	=>$product['model_name'],
            "OTP"	=> $product['otr'],
            "APR"	=> $product['apr'] . "%",
            "Rental"=>	$product['rental'],
            "Period"	=> $product['period'],
            "Mileage"=>	$product['mileage'],
            "Cash_deposite"=>	$cashDeposit,
            "Cashdeposite"	=> $product['cash_deposit'],
            "Emi"	=>$product['rental'],
            "Doors"=>	"3",
            "Fuel"	=>"Petrol",
            "Engine"=>	"1.4",
            "Transmission"=>	"Manual",
            "Body"	=>"Hatchback",
            "Balloon"=>	$product['optional_final'],
            "DC"	=>"750.0000",
            "Dealercommission"=>	null,
            "ROI"	=> $product['fixed_rate'] . "%",
            "Amountfinancial"	=>"",
            "IsSelected"=>	false,
            "IsSelected1"=>	false,
            "IsSelected2"=>	false,
            "Financeproduct"=>	$product['finance_product'],
            "Feature_1"	=>$product['feature1'],
            "Feature_2"	=>$product['feature2'],
            "Feature_3"	=>$product['feature3'],
            "Feature_4"	=>$product['feature4'],
            "Feature_5"	=>$product['feature5'],
            "Feature_6"	=>$product['feature6'],
            "T_C"	=>$product['t_c'],
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
            "I"	=>$product['i'],
            "F1"	=>"",
            "F2"	=>"",
            "F3"	=>"",
            "M1"	=>"",
            "M2"	=>"",
            "T"=>	$product['t'],
            "T1"=>	"",
            "Depositevalid"=>	$product['deposit_valid'],
            "Pmt"	=>$product['pmt'],
            "Pmt1"	=>$product['pmt'],
            "Interest"	=>$product['interest'],
            "Check1"	=> $product['check_val'],
            "TradeIndeposite"=>	$product['trade_in_deposit'],
            "CashDeposite"	=>$product['cash_deposit'],
            "Minddeposite"	=>$product['min_deposit'],
            "Maxddeposite"	=>$product['max_total_deposit'],
            "CashDeposite1"=>	$product['cash_deposit'],
            "RetailerPhone"	=>"01908 308200",
            "OptionlFinal" => $product['optional_final'],
            "Discription"=>	"Milton Keynes Audi",
            "PostCode"	=> "MK15 0DQ",
            "RetailerId"=>	"166",
            "Searchbycartotal_deposite"	=>null,
            "Brand"	=>$product['brand_name'],
            "ReatialPrice"	=>null,
            "DepositeValid"=>	null,
            "TotalDeposite"	=>"",
            "FirstStockId"	=>"11739",
            "Miles1"	=>null,
            "DepositeContribution"=>	$product['deposit_contribution'],
            "TotalAmountPayable"=>	null,
            "TotalAmountCredit"	=>null
        );
        
    }
        
}
ksort($products);
print(json_encode($products));