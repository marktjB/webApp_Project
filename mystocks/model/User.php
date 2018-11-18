<?php
	class User {
		private $id = "";
		function __construct($id){
			$this->id = $id;
		}
		function __destruct(){
			
		}
		function getId(){
			return $this->id;
		}
	}
?>