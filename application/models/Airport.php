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
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) <= 3)
				$this->id = $value;
		}
		
		public function setCommunity($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 100)
				$this->community = $value;
		}
		public function setAirport($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 60)
				$this->airport = $value;
		}
		public function setRegion($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 2)
				$this->region = $value;
		}
		public function setCoordinates($value) {
			if (preg_match('/[^0-9a-zA-Z°"\']/', $value) || strlen($value) < 100)
				$this->coordinates = $value;
		}
		public function setRunway($value) {
			if (preg_match('/[^0-9]/', $value) || strlen($value) < 5)
				$this->runway = $value;
		}
		public function setAirline($value) {
			if (preg_match('/[^a-zA-Z]/', $value) || strlen($value) < 100)
				$this->airline = $value;
		}
	}
?>