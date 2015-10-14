<?php

	function verificar_datos($entidad, $oficina, $dc, $cuenta) {
	// Array Asociativo donde se guardarán los errores en caso de existir
	$errores = array();

	// Si algunos de los campos se ha dejado en blanco ...
	if ( empty($entidad) || empty($oficina) || empty($dc) || empty($cuenta) ) {
		// Se carga un error de campos vacíos en el array
		$errores['campos_vacios'] = true;
	}

	// Si la longitud no se ajusta a la especificación ...
	if ( strlen($entidad)!= 4 || strlen($oficina)!= 4 || strlen($dc)!=2 || strlen($cuenta)!= 10) {
		// Se carga un error en el array para dejar constancia de este hecho
		$errores['longitud_campos'] = true;
	}

	if ( !is_numeric($entidad) || !is_numeric($oficina) || !is_numeric($dc) || !is_numeric($cuenta) ) {
		$errores['alfanumericos'] = true;
	}

	return $errores; // Se devuelve el array de errores

	}

	function verificar_dc($entidad, $oficina, $dc, $cuenta ){
	$entidadoficina = $entidad . $oficina; // Se compacta entidad y oficina en un mismo string
	$multiplicadores1 = array(4, 8, 5, 10, 9, 7, 3, 6 );
	$suma = 0;

	for ($i=0; $i < 8; $i++) { 
		$suma += $entidadoficina[$i] * $multiplicadores1[$i];
	}

	$dc1 = 11 - $suma % 11;
	if ( $dc1 == 11 ) {
		$dc1 = 0;
	}else if ( $dc1 == 10) {
		$dc1 = 1;
	}

	$multiplicadores2 = array(1, 2, 4, 8, 5, 10, 9, 7, 3, 6 );
	$suma = 0;
	for ($i=0; $i<10 ; $i++) { 
		$suma += $cuenta[$i] * $multiplicadores2[$i];
	}

	$dc2 = 11 - $suma % 11;
	if ( $dc2 == 11 ) {
		$dc2 = 0;
	}else if ( $dc2 == 10) {
		$dc2 = 1;
	}

	// echo "DC: ".$dc1.$dc2."<br>";
	if ( $dc == $dc1 . $dc2 ) {
		return true;
	} else {
		return false;
	}

	}

	if ( !$_POST ) {
	
			include_once 'codigo.html.php';

	}else{

		$entidad = htmlspecialchars($_POST['entidad'], ENT_QUOTES, 'UTF-8');
		$oficina = htmlspecialchars($_POST['oficina'], ENT_QUOTES, 'UTF-8');
		$dc = htmlspecialchars($_POST['dc'], ENT_QUOTES, 'UTF-8');
		$cuenta = htmlspecialchars($_POST['cuenta'], ENT_QUOTES, 'UTF-8');

		if( $lista_errores = verificar_datos($entidad, $oficina, $dc, $cuenta) ){

			include 'error.html.php';

		} else {

			if(verificar_dc($entidad, $oficina, $dc, $cuenta)) {

			    echo $entidad . "-" . $oficina . "-" . $dc . "-" . $cuenta;

			}else{

				include 'error.html.php';

			}
		}

	}

?>