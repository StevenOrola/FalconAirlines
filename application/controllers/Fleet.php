<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends Application 
{

    function __construct() 
    {
        parent::__construct();
    }

    //Homepage for Fleet       
    public function index() 
    {
        $rows = $this->info->all();

        //generate the tables
        $this->load->library('table');
        $this->table->set_heading('Plane ID', 'Plane Name', 'Plane Type');
        $this->data['thetable'] = $this->table->generate($rows);
        $this->data['pagebody'] = 'fleet';
        $this->render();
    }

}
