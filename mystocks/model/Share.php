<?php
	class Share {
		private $id;
		private $owner;
		private $valueAtPurchase;
		private $company;
		function __construct($id, $o, $c){
			$this->id = $id;
			$this->owner = $o;
			$this->company = $c;
		}
		function __destruct(){
			
		}
		function getOriginalValue(){
			return $this->valueAtPurchase;
		}
		function getCurrentValue(){
			return $this->company->getCurrentValue();
		}
		function getCompanyName(){
			return $this->company->getName();
		}
		function setOriginalValue($val){
			$this->valueAtPurchase = $val;
		}
		function getDifference(){
			return $this->getCurrentValue() - $this->valueAtPurchase;
		}
		function sell(){
			require 'database.php';
			$query = 'DELETE FROM experimentalshares WHERE
					  shareId = :id';
			$statement = $db->prepare($query);
			$statement->bindValue(':id', $id);
			$statement->execute();
			$statement->closeCursor();
		}
	}
?>