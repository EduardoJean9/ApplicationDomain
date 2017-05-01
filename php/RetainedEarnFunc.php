<?php

//include 'IncomeStatFunc.php';

function getEarningBefore(){
	$previous = 0.0;
	echo number_format((float)abs($previous), 2, '.', ',');
}

function getREdate(){
	$date = strtotime("-1 year", time());
	echo date('Y/m/d', $date);
}

function calculateDividends(){
	return 00.00;
}
function printDividends(){
	$total= calculateDividends();
	echo number_format((float)abs($total), 2, '.', ',');
}

function calcRE(){
	$In = calcTotalIncome();
	$div = calculateDividends();
	$final = $In-$div;
	return $final;

}
function printRE(){
	$total = calcRE();
	if($total <0){
		echo "( ";
	}
	echo number_format((float)abs($total), 2, '.', ',');
	if($total < 0){
		echo " )";
	}
}


?>
