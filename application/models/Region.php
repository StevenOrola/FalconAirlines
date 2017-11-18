<?php 
	require_once APPPATH . 'models/Entity.php';
	class Region extends Entity
	{
		public $id;
		public $name;
		public $anchor;
		public function setId($value) {
			if (strlen($value) <= 100)
				$this->id = $value;
		}
		
		public function setName($value) {
			if (strlen($value) < 100)
				$this->name = $value;
		}
		public function setAnchor($value) {
			if (strlen($value) < 100)
				$this->dest1 = $value;
		}
	}
?>