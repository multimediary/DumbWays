<?php
function gabunganNama($Z, $A){
	$n = strlen($Z);
	$o = strlen($A);
	if($n==$o){
		$r = "";
		for($x=0;$x<$n;$x++){
			$r .= $Z[$x].$A[$x];
		}
		return $r;
	}else{
		return "Panjang String Tidak Sama";
	}
}

$katapertama = "lesley";
$katakedua = "karrie";
echo gabunganNama($katapertama, $katakedua)
?>