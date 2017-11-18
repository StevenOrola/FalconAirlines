<?php

class Flight extends Application {

    var $Falcon;
    var $dests;
    var $planes;
    var $airport;

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('Flights');
        $this->data['schedules'] = $this->Flights->getSchedule();
        $this->data['pagebody'] = 'flight';
        $this->data['pagetitle'] = 'Flights';
        $this->render();
    }

    public function show($key) {
        $this->load->helper('form');
        //$role = $this->session->userdata('userrole');
        $this->data['schedules'] = $this->flights->getSchedule();

        foreach ($this->data['schedules'] as $schedule) {
            if ($schedule['planeId'] == $key)
                $this->session->set_userdata('flight', $schedule);
        }

        $flight = $this->session->userdata('flight');
        // this is the view we want shown
        /* if ($role == ROLE_OWNER) {
          $this->data['pagebody'] = 'flightDetailOwner';
          $fields = array(
          'fmodel' => form_label($flight['planeId']),
          'fairline' => form_label('Airline: Falcon'),
          'fto'  => form_label('To') . form_input('dest', $flight['dest']),
          'fterminal'  => form_label('Terminal: Main'),
          'fcommunity'  => form_label('Community') . form_input('community', $flight['community']),
          'zsubmit'    => form_submit('submit', 'Update the Flight'),
          );
          $this->data = array_merge($this->data, $fields); */
        //} else {
        $this->data['pagebody'] = 'flightDetail';
        $this->data = array_merge($this->data, (array) $flight);
        //}

        $this->data['pagetitle'] = 'Flight';
        $this->render();
    }

    public function submit() {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->flights->rules());
        $flight = (array) $this->session->userdata('flight');
        $flight = array_merge($flight, $this->input->post());
        // $flight = (object) $flight;  // convert back to object
        $this->session->set_userdata('flight', (object) $flight);

        // validate away
        if ($this->form_validation->run()) {
            $this->flights->updateSchedule($flight);
            $this->alert('Fleet ' . $flight['planeId'] . ' updated', 'success');
        } else {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $test = $this->flights->getSchedule();
        redirect('/flight');
    }

    // Build a suitable error mesage
    private function alert($message) {
        $this->load->helper('html');
        $this->data['error'] = heading($message, 3);
    }

    // Forget about this edit
    function cancel() {
        $this->session->unset_userdata('flight');
        redirect('/flight');
    }

    // Delete this item altogether
    function delete() {
        $dto = $this->session->userdata('flight');
        $flight = $this->flights->get($dto->id);
        $this->flights->delete($flight->id);
        $this->session->unset_userdata('flight');
        redirect('/flight');
    }

}

?>	