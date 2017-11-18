<?php 
	require_once APPPATH . 'models/Entity.php';
	class Airplane extends Entity
	{
		public $id;
		public $manufacturer;
		public $model;
		public $price;
		public $seats;
		public $reach;
		public $cruise;
		public $takeoff;
		public $hourly;
		
		public function setId($value) {
			if (preg_match('/[^a-zA-Z0-9]/', $value) || strlen($value) <= 100)
				$this->id = $value;
		}
		
		public function setManufacturer($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 100)
				$this->manufacturer = $value;
		}
		public function setModel($value) {
			if (preg_match('/[^a-zA-Z0-9]/', $value) || strlen($value) < 4)
				$this->model = $value;
		}
		public function setPrice($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 5)
				$this->price = $value;
		}
		public function setSeats($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 3)
				$this->seats = $value;
		}
		public function setReach($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 5)
				$this->reach = $value;
		}
		public function setCruise($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 5)
				$this->cruise = $value;
		}
		public function setTakeoff($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 5)
				$this->takeoff = $value;
		}
		public function setHourly($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 5)
				$this->hourly = $value;
		}
	}
?>