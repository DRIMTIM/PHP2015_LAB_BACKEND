<?php

Abstract Class Validator {

/*
 * @registry object
 */
protected $registry;

function __construct($registry) {
	$this->registry = $registry;
	$this->onConstruct();
}

abstract function onConstruct();

}

?>
