<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flights extends Application
{

	function __construct()
	{
		parent::__construct();
	}
        
        //Homepage for bravo
        
	public function index()
	{
            $this->data['pagebody'] = 'flights';
            $this->render(); 
	}

}