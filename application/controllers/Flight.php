<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flight extends Application
{

	function __construct()
	{
		parent::__construct();
	}
        
        //Homepage for bravo
        
	public function index()
	{
		$this->data['pagebody'] = 'flight';
		$this->render(); 
	}

}