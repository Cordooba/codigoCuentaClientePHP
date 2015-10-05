<?php

	if ( (empty($_POST['modDigitos1']) || empty($_POST['modDigitos2']) || 
		empty($_POST['modDigitos3']) || empty($_POST['modDigitos4']) ) ) {

			include 'codigo.html.php';

	}else{

		$modDigitos1 = $_POST['modDigitos1'];
		$modDigitos2 = $_POST['modDigitos2'];
		$modDigitos3 = $_POST['modDigitos3'];
		$modDigitos4 = $_POST['modDigitos4'];

        $valCuenta = valcuenta_bancaria($modDigitos1, $modDigitos2, $modDigitos3, $modDigitos4);

		if( !$valCuenta ){
			    include 'codigo.html.php';
		}else{
			    echo $modDigitos1 . "-" . $modDigitos2 . "-" . $modDigitos3 . "-" . $modDigitos4;
		}

	}

	function valcuenta_bancaria($modDigitos1, $modDigitos2, $modDigitos3, $modDigitos4){

	    if (strlen($modDigitos1)!= 4 && is_numeric($modDigitos1) && empty($modDigitos1)) {
            return false;
        }
	    if (strlen($modDigitos2)!= 4 && is_numeric($modDigitos2) && empty($modDigitos2)) {
            return false;
        }
	    if (strlen($modDigitos3)!= 2 && is_numeric($modDigitos3) && empty($modDigitos3)) {
            return false;
        }
	    if (strlen($modDigitos4)!= 10 && is_numeric($modDigitos4) && empty($modDigitos4)) {
            return false;
        }

	    if (mod11_cuentaBancaria("00".$modDigitos1.$modDigitos2)!= $modDigitos3{0}) {
            return false;
        }
	    if (mod11_cuentaBancaria($modDigitos4)!= $modDigitos3{1}) {
            return false;
        }
	    return true;
	}

	function mod11_cuentaBancaria( $numero ){
	if ( strlen($numero)!=10) {
        return "?";
    }

	$cifras = Array(1,2,4,8,5,10,9,7,3,6);
	$chequeo=0;
	for ($i=0; $i < 10; $i++) {
        $chequeo += substr($numero,$i,1) * $cifras[$i];
    }

	$chequeo = 11 - ($chequeo % 11);

	if ($chequeo == 11) {
        $chequeo = 0;
    }
	if ($chequeo == 10) {
        $chequeo = 1;
    }

	return $chequeo;
}

?>