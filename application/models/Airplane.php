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
			if (strlen($value) <= 50)
				$this->id = $value;
		}
		
		public function setManufacturer($value) {
			if (strlen($value) < 50)
				$this->manufacturer = $value;
		}
		public function setModel($value) {
			if (strlen($value) < 4)
				$this->model = $value;
		}
		public function setPrice($value) {
			if (strlen($value) < 100)
				$this->price = $value;
		}
		public function setSeats($value) {
			if (strlen($value) < 4)
				$this->seats = $value;
		}
		public function setReach($value) {
			if (strlen($value) < 5000000)
				$this->reach = $value;
		}
		public function setCruise($value) {
			if (strlen($value) < 5000000)
				$this->cruise = $value;
		}
		public function setTakeoff($value) {
			if (strlen($value) < 5000000)
				$this->takeoff = $value;
		}
		public function setHourly($value) {
			if (strlen($value) < 100000000000)
				$this->hourly = $value;
		}
	}
?>