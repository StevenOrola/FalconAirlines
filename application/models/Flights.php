<?php
	require_once APPPATH . 'models/Airlines.php';
	class Flights extends CI_Model
	{
		var $data = array();
		//var $airlines;
		var $airports;
		var $airplanes;
		// Constructor
		public function __construct()
		{
			parent::__construct();
			
			//assign models to each variable
			$airlines = new Airlines();
			$airports = new Airports();
			$airplanes = new Airplanes();
			$this->airlinelist = json_decode(json_encode($airlines->all()), True); 
			$this->airportlist = json_decode(json_encode($airports->all()), True); 
			$this->airplanelist = json_decode(json_encode($airplanes->all()), True); 
			
			//data is array of models has planes and airlines which are an array of stdObjects 
			$this->data['airlines'] = $this->airlinelist;
			$this->data['airports'] = $this->airportlist;
			$this->data['airplanes'] = $this->airplanelist;

                        
			foreach ($this->data['airlines'] as $key => $record)
				if ($record['id'] == 'falcon')
					$falcon = $record;
			// Find correct Airport
			foreach ($this->data['airports'] as $key => $record)
				if ($record['id'] == $falcon['base'])
					$airport = $record;
			// Collect destination
			$dests = array('1' => array('dest' => $falcon['dest1']), '2' => array('dest' => $falcon['dest2']), '3' => array('dest' => $falcon['dest3']));
			$this->data['dests'] = $dests;
			// Populate planes
			$i = 1; // Count to 3 because we have 3 dests
			foreach ($this->data['airplanes'] as $airplane)
				if ($i < 4) 
					$planes[$i++] = array('planeCode' => $airplane['id']);
			// Formate schedules
			$this->data['schedules'] = array(
				'1' => array(
					'dest' => $falcon['dest1'], 
					'planeCode' => $planes['1']['planeCode'], 
					'community' => $airport['community']), 
				'2' => array(
					'dest' => $falcon['dest2'], 
					'planeCode' => $planes['2']['planeCode'], 
					'community' => $airport['community']), 
				'3' => array(
					'dest' => $falcon['dest3'], 
					'planeCode' => $planes['3']['planeCode'], 
					'community' => $airport['community']));
		}
		public function rules()
		{
		    $config = array(
		        ['field' => 'seats', 'label' => 'Seats', 'rules' => 'integer|less_than[10]'],
		        ['field' => 'reach', 'label' => 'Reach', 'rules' => 'integer|max_length[4]'],
		        ['field' => 'cruise', 'label' => 'Cruise', 'rules' => 'integer|less_than[999]'],
		        ['field' => 'takeoff', 'label' => 'Take off', 'rules' => 'integer'],
		        ['field' => 'hourly', 'label' => 'Hourly', 'rules' => 'integer'],
		    );
		    return $config;
		}
		public function getSchedule() {
			
			return $this->data['schedules'];
		}
		
		public function updateSchedule($newSchedule) {
			$this->data['schedules'][$newSchedule['planeCode']]['dest'] = $newSchedule['dest'];
			$this->data['schedules'][$newSchedule['planeCode']]['community'] = $newSchedule['community'];
		}
		// retrieve all of the quotes
		public function all()
		{
			return $this->data;
		}
	}
?>