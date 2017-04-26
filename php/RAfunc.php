<?php
function decideRA($var){
  switch ($var) {
   case "CR":
            computeCurrentRatio();
   case "QR":
            computeQuickRatio();
   case "PR":
            computeProfitMargin();
   case "RoE":
            computeRoE();
 }
}
function computeCurrentRatio(){
  echo "<h1>Current Ratio</h1>";
  echo "<H1><sup>Current Assets</sup>&frasl;<sub>Current Liabilities</sub></H1>";

}
function computeQuickRatio(){
  echo "<h1>Quick Ratio</h1>";
  echo "<H1><sup>Current Assets - Inventory</sup>&frasl;<sub>Current Liabilities</sub></H1>";
}
function computeProfitMargin(){
  echo "<h1>Profit Margin</h1>";
  echo "<H1><sup>Net Income</sup>&frasl;<sub>Sales</sub></H1>";
}
function computeRoE(){
  echo "<h1>Return on Equity</h1>";
  echo "<H1><sup>Net Income</sup>&frasl;<sub>Owner's Equity</sub></H1>";
}



?>
