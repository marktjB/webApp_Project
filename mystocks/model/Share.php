<?php
	class Share {
		private $owner;
		private $valueAtPurchase;
		private $stock;
		function __construct($o, $s){
			$this->owner = $o->getName();
			$this->stock = $s->getName();
			$this->valueAtPurchase = $s->getCurrentValue();
		}
		function __destruct(){
			
		}
	}
?>