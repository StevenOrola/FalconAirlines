<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fleets extends Application
{

	function __construct()
	{
		parent::__construct();
	}
        
        //Homepage for bravo
        
	public function index()
	{
		$this->data['pagebody'] = 'fleets';
		$this->render(); 
	}

}
