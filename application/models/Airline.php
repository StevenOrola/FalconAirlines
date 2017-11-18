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
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) <= 100)
				$this->id = $value;
		}
		
		public function setBase($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 4)
				$this->priority = $value;
		}
		public function setDest1($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 4)
				$this->dest1 = $value;
		}
		public function setDest2($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 4)
				$this->dest2 = $value;
		}
		public function setDest3($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 4)
				$this->dest3 = $value;
		}
	}
?>