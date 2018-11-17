<?php
	class User {
		private $name = "";
		function __construct($n){
			$this->name = $n;
		}
		function __destruct(){
			
		}
		function getName(){
			return $this->name;
		}
		function setName($n) {
			$this->name = $n;
		}
	}
?>