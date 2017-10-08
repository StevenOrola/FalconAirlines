<?php


class Info extends CI_Model
{
	var $data = array(
             
		'1'	 => array('planeID' => 'F001', 'planeName' => 'maskoff', 
                                'type'	 => 'Airbus A300'),
		'2'	 => array('planeID' => 'F002', 'planeName' => 'dark fantasy', 
                                'type'	 => 'Airbus A310'),
		'3'	  => array('planeID' => 'F003', 'planeName' => 'graduation', 
                                'type'	 => 'Airbus A330')
			 
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();

		// inject each "record" key into the record itself, for ease of presentation
		foreach ($this->data as $key => $record)
		{
			$record['key'] = $key;
			$this->data[$key] = $record;
		}
	}
        
        // retrieve a single fleet, null if not found
	public function get($which)
	{
		return !isset($this->data[$which]) ? null : $this->data[$which];
	}

	// retrieve all of the planes in the fleet
	public function all()
	{
		return $this->data;
	}

}

