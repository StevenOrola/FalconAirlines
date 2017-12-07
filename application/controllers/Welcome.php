<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    var $falcon;
    var $base;
    var $dest1;
    var $dest2;
    var $dest3;

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('Flights');
        $this->data = $this->Flights->all();
        $role = $this->session->userdata('userrole');

        // count airplanes
        $count = count($this->data['airplanes']);

        //get falcon data
        foreach ($this->data['airlines'] as $key => $record) {
            if ($record['id'] == 'falcon') {
                $falcon = $record;
            }
        }

        foreach ($this->data['airports'] as $key => $value) {
            if ($value['id'] == $falcon['base']) {
                $base = $value;
            }

            if ($value['id'] == $falcon['dest1']) {
                $dest1 = $value;
            }

            if ($value['id'] == $falcon['dest2']) {
                $dest2 = $value;
            }

            if ($value['id'] == $falcon['dest3']) {
                $dest3 = $value;
            }
        }

        $this->data['pagebody'] = 'homepage';
        $this->data['pagetitle'] = 'Falcon Airlines';      
        $this->data['role'] = $role;
        $this->data['base'] = $base['id'];
        $this->data['port1'] = $dest1['id'];
        $this->data['port2'] = $dest2['id'];
        $this->data['port3'] = $dest3['id'];
        $this->data['planeCount'] = $count;
        $this->render();
    }

}
