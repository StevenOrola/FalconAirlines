<?php 
	require_once APPPATH . 'models/Entity.php';
	class Airline extends Entity
	{
		public $id;
		public $base;
		public $dest1;
		public $dest2;
		public $dest3;
                
		public function setId($value) {
			if (strlen($value) <= 20)
				$this->id = $value;
		}
		
		public function setBase($value) {
			if (strlen($value) < 4)
				$this->priority = $value;
		}
		public function setDest1($value) {
			if (strlen($value) < 4)
				$this->dest1 = $value;
		}
		public function setDest2($value) {
			if (strlen($value) < 4)
				$this->dest2 = $value;
		}
		public function setDest3($value) {
			if (strlen($value) < 4)
				$this->dest3 = $value;
		}
	}
?>