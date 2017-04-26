<?php
function getEarningBefore(){
	$previous = 0.0;
	echo number_format((float)abs($previous), 2, '.', '');
}

function getREdate(){
	$date = strtotime("-1 year", time());
	echo date('Y/m/d', $date);
}

?>