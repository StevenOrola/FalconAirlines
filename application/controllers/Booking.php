<?php

class Booking extends Application {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['pagebody'] = 'booking';
        $this->data['pagetitle'] = 'Search Flight';
        $this->render();
    }
}

function match($from, $to, $record) {
    return $record['base'] == $from && ($record['dest1'] == $to || $record['dest2'] == $to || $record['dest3'] == $to);
}

function getAirport($key, $source) {
    return $source['airports'][$key]['airport'];
}

?>	