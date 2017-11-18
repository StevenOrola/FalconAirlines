<?php
class Fleets extends CI_Model
{
	var $data;
	var $airplanes;
	var $airports;
	// Constructor
	public function __construct()
	{
		parent::__construct();
		//assign models to each variable
		$airports = new Airports();
		$airplanes = new Airplanes();
		$this->airportlist =  json_decode(json_encode($airports->all()), True);
		$this->airplanelist = json_decode(json_encode($airplanes->all()), True);
		//data is array of models has planes and airlines which are an array of stdObjects 
		$this->data['airports'] = $this->airportlist;
		$this->data['airplanes'] = $this->airplanelist;		
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
	public function updateAirplane($newAirplane) {
		$this->data['airplanes'][$newAirplane['id']]['manufacturer'] = $newAirplane['manufacturer'];
		$this->data['airplanes'][$newAirplane['id']]['seats'] = $newAirplane['seats'];
		$this->data['airplanes'][$newAirplane['id']]['reach'] = $newAirplane['reach'];
		$this->data['airplanes'][$newAirplane['id']]['cruise'] = $newAirplane['cruise'];
		$this->data['airplanes'][$newAirplane['id']]['takeoff'] = $newAirplane['takeoff'];
		$this->data['airplanes'][$newAirplane['id']]['hourly'] = $newAirplane['hourly'];
		// reset($this->data);
	}
	public function getAirplane($which) {
		return !isset($this->data['airplanes'][$which]) ? null : $this->data['airplanes'][$which];
	}
	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}
}