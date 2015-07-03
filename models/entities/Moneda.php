<?php
class Moneda {

	const PESOS = "PESOS";
	const DOLARES = "DOLARES";
	public static $SIMBOLOS = array(Moneda::PESOS => "$", Moneda::DOLARES => "U\$S");

	public static function hasValue($val) {
		foreach ($this as $key => $value) {
			if($value == $val) {
				return true;
			}
		}
		return false;
	}

}
?>
