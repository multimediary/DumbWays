<table border="1">
<?php
function cetak_gambar($bilangan){
	for($i = 0; $i <$bilangan; $i++) 
    { 
		if($i % 2 == 0){ 
			for ($j = 0; $j < $bilangan; $j++) 
			{ 
				if($j==2){ echo "="; }else{ echo "*"; }
			
			}
        }
		if($i % 2 != 0){ 
			for ($j = 0; $j < $bilangan; $j++) 
			{ 
				if($j==1 || $j==3){ echo "="; }else{ echo "*"; }
			
			}
        }
        echo "<br>"; 
    } 
}

echo cetak_gambar(5)
?>