<?php
$ids = array();
for($i = 1; $i < 5; $i++) {
   if(isset($_POST['P' . $i]) && $_POST['P' . $i] != "")
           $ids[] = $_POST['P' . $i];
}
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

$sqlIds = implode(",", $ids);
$sql = "select a.*, b.name as brand_name, c.name as model_name, d.name as variant_name from stats a "
        . "inner join trims d on d.id = a.trim "
        . "inner join models c on d.model = c.id "
        . "inner join brands b on b.id = c.brand "
        . "where a.id in ($sqlIds)";

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
      $products[] = array(
          "Acceptancefee" =>	$product['acceptance_fee'],
          "Discount" =>	"3.382187",
          "Id" =>	$product['id'],
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
          "Amountfinancial"	=>$product['amount_financed'],
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
          "TotalDeposite"	=>$product['total_deposit'],
          "FirstStockId"	=>"11739",
          "Miles1"	=>null,
          "DepositeContribution"=>	$product['deposit_contribution'],
          "TotalAmountPayable"=>	null,
          "TotalAmountCredit"	=>null
      );
}

$params = array('Retailer Name', 'Deal Code', 'Retailer Phone', 'Model', 'Variant', $products[0]['Period'] . ' Payments of', 'Retail Cash Price',
        'Deposit Contribution', 'Representative APR', 'Rate of Interest', 'Cash Deposit', 'Total Deposit',
        'Duration', 'Average miles per year', 'Acceptance fee', 'Optional final payment', 'Option to purchase fee',
        'Total amount payable', 'Total amount of credit', 'Excess mileage (per mile)');
?>
<table class="table">
   <tbody>
       <tr>
           <td style="vertical-align: middle; font-size: 20px; width: 20%">Choose your car</td>
            <?php for($j = 0; $j < count($products); $j++) { ?>
            <td>
                <input type="hidden" value="<?=$products[$j]['Discount'] ?>" id="txtdistance">
                <div style="padding-top: 5px; padding-bottom: 5px;">
                  <center>
                     <div class="checkbox" style="margin: 0px;">
                         <label style="font-size: 15px;font-family: &#39;Mukta Vaani&#39; , sans-serif;">
                         <!--<input type="checkbox" id="<?=$products[$j]['Id'] ?>" name="chb" class="chkbx" 
                                value="<?=$products[$j]['Emi'] ?>" data-id="<?=$products[$j]['DealerId'] ?>" 
                                data-dist="<?=$products[$j]['Discount'] ?>">Save deals</label>-->
                         <input type="hidden" id="dealerId" value="<?=$products[$j]['DealerId'] ?>">
                     </div>
                  </center>
                </div>
                <div class="t-car">
                  <img src="../Car/<?=$products[$j]['Imagename'] ?>" alt="">
                </div>
            </td>
            <?php } ?>
       </tr>
       <tr>
         <td style="vertical-align: middle;"><?=$params[0] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center" style=""><?=$products[$j]['RetailerName'] ?></td>
         <?php } ?>
       </tr>
       <tr style="background-color: #f7f7f7">
         <td style="vertical-align: middle;"><?=$params[1] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center" style=""><?=$products[$j]['DealCode'] ?></td>
         <?php } ?>
       </tr>
       <tr style="background-color: #f7f7f7">
         <td style="vertical-align: middle;"><?=$params[2] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center" style=""><?=$products[$j]['RetailerPhone'] ?></td>
         <?php } ?>
       </tr>
       <tr style="background-color: #fff; font-size: 17px; vertical-align: middle">
         <td style="vertical-align: middle;"><?=$params[3] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center" style="background-color: #fff; font-size: 17px;"><?=$products[$j]['Model'] ?></td>
         <?php } ?>
       </tr>
       <tr style="background-color: #f7f7f7">
         <td style="vertical-align: middle;"><?=$params[4] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <?php $style = (($j + 1) % 2 != 0) ? 'background-color: #00bfff;' : ''; ?>
         <td class="text-center" style="<?=$style ?>"><?=$products[$j]['Variant'] ?></td>
         <?php } ?>
       </tr>
       <tr style="background-color: #f7f7f7">
         <td style="vertical-align: middle;"><?=$params[5] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['Emi'] ?></td>
         <?php } ?>
       </tr>
       <tr style="background-color: #f7f7f7">
         <td style="vertical-align: middle;"><?=$params[6] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['OTP'] ?></td>
         <?php } ?>
       </tr>
       <tr>
         <td style="vertical-align: middle;"><?=$params[7] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['DepositeContribution'] ?></td>
         <?php } ?>
       </tr>
       <tr class="sp-row">
         <td style="vertical-align: middle;"><?=$params[8] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center"><?=$products[$j]['APR'] ?> APR</td>
         <?php } ?>
       </tr>
       <tr>
         <td style="vertical-align: middle;"><?=$params[9] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center"><?=$products[$j]['ROI'] ?> fixed</td>
         <?php } ?>
       </tr>
       <tr>
         <td style="vertical-align: middle;"><?=$params[10] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['CashDeposite'] ?></td>
         <?php } ?>
       </tr>
       <tr class="sp-row">
         <td style="vertical-align: middle;"><?=$params[11] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['TotalDeposite'] ?></td>
         <?php } ?>
       </tr>
       <tr>
         <td style="vertical-align: middle;"><?=$params[12] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center"><?=$products[$j]['Period'] ?></td>
         <?php } ?>
       </tr>
       <tr class="sp-row">
         <td style="vertical-align: middle;"><?=$params[13] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center"><?=$products[$j]['Mileage'] ?></td>
         <?php } ?>
       </tr>
       <tr>
         <td style="vertical-align: middle;"><?=$params[14] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['Acceptancefee'] ?></td>
         <?php } ?>
       </tr>
       <tr class="sp-row">
         <td style="vertical-align: middle;"><?=$params[15] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['OptionlFinal'] ?></td>
         <?php } ?>
       </tr>
       <tr>
         <td style="vertical-align: middle;"><?=$params[16] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['OTPfee'] ?></td>
         <?php } ?>
       </tr>
       <tr class="sp-row">
         <td style="vertical-align: middle;"><?=$params[17] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['Amountfinancial'] ?></td>
         <?php } ?>
       </tr>
       <tr>
         <td style="vertical-align: middle;"><?=$params[18] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['Amountfinancial'] ?></td>
         <?php } ?>
       </tr>
       <tr class="sp-row">
         <td style="vertical-align: middle;"><?=$params[19] ?></td>
         <?php for($j = 0; $j < count($products); $j++) { ?>
         <td class="text-center">£<?=$products[$j]['Excessmileage'] ?> p</td>
         <?php } ?>
       </tr>
       <tr>
           <td colspan="5" style="padding: 5px;">Please note, the representative example displayed here is indicative only. For an
               exact quote, please contact your nearest retailer. We strive our best to match the
               current offers and calculation for different automobile brands. It is possible that
               despite our best efforts, sometime there might be errors either in price, calculations
               or entire representative example.
           </td>
       </tr>

   </tbody>
</table>
