<?php
$angka_awal = 1;
$angka_akhir = 100;

for($x=$angka_awal; $x<=$angka_akhir; $x++){
	$y = 0;
	for($z=1;$z<=$x;$z++){
		if($x % $z == 0){
			$y++;	
		}
	}
	if($y == 2){		
		echo $x;		
		echo "<br>";		
	}
}


?>