<?php
function elapsed($timestamp){
	$date = new DateTime();
	$current=$date->getTimestamp();
	$time=intval(($current-$timestamp)/60);
	$elapsed=$time.' min.';
	if($time>=60){$val=intval($time/60);$min=$time-($val*60);$elapsed=$val.' h.';}
	if($time>=1440){$day=intval($time/1440);if($day==1){$elapsed=$day.' day';}else{$elapsed=$day.' days';}}
	//echo date("d/m/Y",$date->getTimestamp());
	
	//$date=date("Y-m-d H:i:s",$date->getTimestamp());
	//$date=getdate();
	//$elapsed=date_format($date,"Y-m-d H:i:s");
	//$date=date_create("2013-03-15");
	//date_sub($date,date_interval_create_from_date_string("40 days"));
	//$elapsed=date_format($date,"Y-m-d H:i:s");
	//if($timestamp2!==0){$elapsed=$current_stamp-$timestamp2;}
	return $elapsed;
}
?>