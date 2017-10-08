<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends Application {

    function __construct() 
    {
        parent::__construct();
    }

    //Homepage for Fleet       
    public function index() 
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'fleet';

        // build the list of authors, to pass on to our view
        $source = $this->info->all();

        // pass on the data to present, as the "authors" view parameter
        $this->data['fleetinfo'] = $source;

        $this->render();
    }
}
