<?php

$arquivo = $_POST["inputArquivoBaseDados"];


$file = fopen($arquivo,"r");

echo "Arquivo : ".$arquivo;

/* $data = fgetcsv ($file, 1000, ";");

var_dump($data);
 */
/* while () {	
	$num = count ($data);
	$row++;
	
	var_dump($data);
}
 */

 
$row = 1;
$handle = fopen($arquivo, "r");
while (($data = fgetcsv($handle, 100, ";")) !== FALSE) {
	$num = count($data);
	//echo "<p> $num fields in line $row: <br /></p>\n";
	$row++;
	for ($c=0; $c < $num; $c++) {
	echo $data[$c] . "<br />\n";
	}
}
fclose($handle); 


?>





