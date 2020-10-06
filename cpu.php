<?php
$start=microtime(true);
function line($line){
	if(php_sapi_name()==='cli'){
		echo $line.PHP_EOL;
	}else{
		echo $line.'<br>'.PHP_EOL;
	}
}
function timer_stop(){
	global $start;
	return microtime(true)-$start;
}
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

line('Regex test');
for($i=0;$i<100000;$i++){
	$a='skfdkshfkjshfkjdjbfbfu12j3jh434j3jbchsjfsfdjfdjfihaihsbcgdend';
	if(strlen($a)<1000) {
		$a .= ' ' . $a;
	}
	preg_match('#.+#',$a);
	preg_match_all("#$i.*?#",$a);
}
line('Finish regex test: '.timer_stop());
