<?php
function gabunganNama($Z, $A){
	$n = strlen($Z);
	$o = strlen($A);
	if($n==$o){
		$r = "";
		$x = 0;
		do {
			$r .= $Z[$x].$A[$x];
			$x++;
		} while ($x <$n);
		
		
		return $r;
	}else{
		return "Panjang String Tidak Sama";
	}
}

$katapertama = "lesley";
$katakedua = "karrie";
echo gabunganNama($katapertama, $katakedua)

?>