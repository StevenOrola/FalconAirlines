<?php 
	require_once APPPATH . 'models/Entity.php';
	class Region extends Entity
	{
		public $id;
		public $name;
		public $anchor;
		public function setId($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) <= 100)
				$this->id = $value;
		}
		
		public function setName($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 100)
				$this->name = $value;
		}
		public function setAnchor($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 4)
				$this->dest1 = $value;
		}
	}
?>