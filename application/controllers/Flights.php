<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flights extends Application
{

        function __construct()
	{
            parent::__construct();
                
	}
        
        //Homepage for flight
        
	public function index()
	{       
           
            
            
            $flights = $this->flightsinfo->all();
   
            //set the style of the table
            $this->load->library('table');
            
            $template = array(
                'table_open'  => '<table border="1" cellpadding="10" cellspacing="5">',
               
            );
   
            $this->table->set_template($template);
            $this->table->set_heading('Plane ID','Flight ID', 'Departure', 'Arrival', 'Base', 'Destination');
            
            //generate the tables
            $this->data['thetable'] = $this->table->generate($flights);
            
        
        
		$this->data['pagebody'] = 'flights';
		$this->render(); 
        }
}