<?php
	class Stock{
		private $name = "";
		private $currentValue = 0;
		public function __construct($n){
			$this->name = $n;
		}
		public function __destruct() {
			
		}
		public function getCurrentValue(){
			return $this->currentValue;
		}
		public function setCurrentValue($val){
			$this->currentValue = $val;
		}
		public function getStockName(){
			return $this->name;
		}
		public function setStockName($n){
			$this->name = $n;
		}
		public static function buyStock($u) {
			$share = new Share($u, $this);
		}
	}
?>