<?php


class FlightsInfo extends CI_Model
{


	var $data = array(

                   array(
                    "planeId" => "F001",  
                    "flightId" => "F111",
                    "departure"=> "01:00",
                    "arrival"=> "03:30",
                    "base"=>"YDT",
                    "dest"=> "YAC"
                    
                    
                  ),
                  array(
                    "planeId" => "F002",  
                    "flightId" => "F112",
                    "departure"=> "01:15",
                    "arrival"=> "04:30",
                    "base"=>"YDT",
                    "dest"=> "YDQ"
                   
                  ),
                  array(
                    "planeId" => "F003",  
                    "flightId" => "F113",
                    "departure"=> "01:20",
                    "arrival"=> "02:30",
                    "base"=>"YDT",
                    "dest"=> "YPZ"
                    
                  ),
                  array(
                    "planeId" => "F001",  
                    "flightId" => "F114",
                    "departure"=> "04:00",
                    "arrival"=> "07:30",
                    "base"=>"YAC",
                    "dest"=> "YDT"
                    
                  ),
                  array(
                    "planeId" => "F002",  
                    "flightId" => "F115",
                    "departure"=> "05:00",
                    "arrival"=> "08:30",
                    "base"=>"YDQ",
                    "dest"=> "YDT"
                    
                  ),
                  array(                     
                    "planeId" => "F003",  
                    "flightId" => "F116",
                    "departure"=> "03:30",
                    "arrival"=> "05:30",
                    "base"=>"YPZ",
                    "dest"=> "YDT"
                    
                  )
                  
                
			 
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


	// retrieve all of the planes in the flight
	public function all()
	{
		return $this->data;
	}

}
