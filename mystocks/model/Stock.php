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
		public function getName(){
			return $this->name;
		}
		public function setName($n){
			$this->name = $n;
		}
		public function buyStock($u) {
			//$share = new Share($u, $s);
			include 'database.php';
			$query = 'INSERT INTO experimentalshares (ownerId, valueAtPurchase, company) VALUES (:ownerId, :valueAtPurchase, :company)';
			$statement = $db->prepare($query);
			$statement->bindValue(':ownerId', $u->getId());
			$statement->bindValue(':valueAtPurchase', $this->currentValue);
			$statement->bindValue(':company', $this->name);
			$statement->execute();
		}
	}
?>