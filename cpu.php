<?php
$time_begin=microtime(true);
function timer_start(){
	global $start_timer;
	$start_timer=microtime(true);
}
function line($line){
	if(php_sapi_name()==='cli'){
		echo $line.PHP_EOL;
	}else{
		echo $line.'<br>'.PHP_EOL;
	}
}
function timer_stop(){
	global $start_timer;
	return microtime(true)-$start_timer;
}


line('Ram test:');
timer_start();
for($i=0;$i<1000000;$i++){
	$a='skfdkshfkjshfkjdjbfbfu12j3jh434j3jbchsjfsfdjfdjfihaihsbcgdendskfdkshfkjshfkjdjbfbfu12j3jh434j3jbchsjfsfdjfdjfihaihsbcgdend';
	$b=$a;
	$c=$i;
	$a=$c;
}
line('Finish RAM test: '.timer_stop());

timer_start();
line('Test operators');
for($i=0;$i<1000000;$i++){
	$a=123;
	$b=$a+$i;
	$c=$a*$i;
	$d=$a/($i+1);
	$e=$a-$i;
	$m=$a|$i;
	$g=$a&$i;
	$x=$a?$b:$c;
}
line('Finish operator test: '.timer_stop());

timer_start();
line('Test string');
for($i=0;$i<1000000;$i++){
	$a='skfdkshfkjshfkjdjbfbfu12j3jh434j3jbchsjfsfdjfdjfihaihsbcgdend';
	if(strlen($a)<1000){
		$a.=' '.$a;
	}
	$b=strpos($a,'_');
	$a2=substr($a,0,10);
	$c=strcmp($a,$a2);
	$d=str_replace('o','a',$a);
	$m=strlen($a);

}
line('Finish string test: '.timer_stop());

line('Array test');
timer_start();
for($i=0;$i<1000000;$i++){
	$a=[$i];
	$b=['123','r'=>'x'];
	$c=$a+$b;
	$d=$b+$a;
	$e=array_merge($c,$d);
	$f=array_replace($e,$d);
	array_push($f,'ok');
	array_pop($a);
	$x=[];
	array_pad($x,100,2);
	array_map(function($x){return $x+1;},$x);
	array_reverse($x);
	array_slice($x,20,3);
	sort($x);
	asort($f);
	$f=array_values($f);
	$f=array_unique($f);
	implode(';',$f);

}
line('Finish array test: '.timer_stop());

line('Serialization test');
timer_start();
for ($i=0;$i<1000000;$i++){
	$a=['ok'=>'x','c'=>['e'=>['k'=>['m'=>['g'=>['x'=>['bcd'=>['o'=>['m'=>['i'=>['i'=>['k']]]]]]]]]]]];
	$b=unserialize(serialize($a));
	$c=json_decode(json_encode($a));

}
line('Serialization test finish: '.timer_stop());

line('Regex test');
timer_start();
for($i=0;$i<200000;$i++){
	$a='skfdkshfkjshfkjdjbfbfu12j3jh434j3jbchsjfsfdjfdjfihaihsbcgdend';
	if(strlen($a)<1000) {
		$a .= ' ' . $a;
	}
	preg_match('#.+#',$a);
	preg_match_all("#$i.*?#",$a);
}
line('Finish regex test: '.timer_stop());





line('Total time: '.(microtime(true)-$time_begin));
