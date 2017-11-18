<?php 
	require_once APPPATH . 'models/Entity.php';
	class Airport extends Entity
	{
		public $id;
		public $community;
		public $airport;
		public $region;
		public $coordinates;
		public $runway;
		public $airline;
		public function setId($value) {
			if (strlen($value) <= 100)
				$this->id = $value;
		}
		public function setCommunity($value) {
			if (strlen($value) < 100)
				$this->community = $value;
		}
		public function setAirport($value) {
			if (strlen($value) < 100)
				$this->airport = $value;
		}
		public function setRegion($value) {
			if (strlen($value) < 100)
				$this->region = $value;
		}
		public function setCoordinates($value) {
			if (strlen($value) < 100)
				$this->coordinates = $value;
		}
		public function setRunway($value) {
			if (strlen($value) < 100)
				$this->runway = $value;
		}
		public function setAirline($value) {
			if (strlen($value) < 100)
				$this->airline = $value;
		}
	}
?>