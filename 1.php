<?php
function hexadesimalConverter($input){
	$hexadesimal = dechex(bindec($input));
	return strtoupper($hexadesimal);
}

echo hexadesimalConverter(1011001101)
?>