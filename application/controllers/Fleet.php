<?php

class Fleet extends Application {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('Fleets');
        $this->data = $this->fleets->all();
        $this->data['pagebody'] = 'airplane';
        $this->data['pagetitle'] = 'Fleet';
        $this->render();
    }

    public function show($key) {
        $this->load->helper('form');
        $role = $this->session->userdata('userrole');

        $this->session->set_userdata('fleet', $this->fleets->getAirplane($key));

        $fleet = $this->session->userdata('fleet');
        // this is the view we want shown
        if ($role == ROLE_OWNER) {
            $this->data['pagebody'] = 'fleetAdmin';
            $fields = array(
                'fmodel' => form_label($fleet['id']),
                'fmanufacturer' => form_label('Manufacturer') . form_input('manufacturer', $fleet['manufacturer']),
                'fseats' => form_label('Seats') . form_input('seats', $fleet['seats']),
                'freach' => form_label('Reach') . form_input('reach', $fleet['reach']),
                'fcruise' => form_label('Cruise') . form_input('cruise', $fleet['cruise']),
                'ftakeoff' => form_label('Takeoff') . form_input('takeoff', $fleet['takeoff']),
                'fhourly' => form_label('Hourly') . form_input('hourly', $fleet['hourly']),
                'zsubmit' => form_submit('submit', 'Update the Fleet'),
            );
            $this->data = array_merge($this->data, $fields);
        } else {
            $this->data['pagebody'] = 'fleet';
            $this->data = array_merge($this->data, (array) $fleet);
        }

        $this->data['pagetitle'] = '';
        $this->render();
    }

    public function submit() {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->fleets->rules());
        $fleet = (array) $this->session->userdata('fleet');
        $fleet = array_merge($fleet, $this->input->post());
        // $fleet = (object) $fleet;  // convert back to object
        $this->session->set_userdata('fleet', (object) $fleet);

        // validate away
        if ($this->form_validation->run()) {
            $this->fleets->updateAirplane($fleet);
            $this->alert('Fleet ' . $fleet['id'] . ' updated', 'success');
        } else {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        redirect('/fleet');
    }

    // Build a suitable error mesage
    private function alert($message) {
        $this->load->helper('html');
        $this->data['error'] = heading($message, 3);
    }

    // Forget about this edit
    function cancel() {
        $this->session->unset_userdata('fleet');
        redirect('/fleet');
    }

    // Delete this item altogether
    function delete() {
        $dto = $this->session->userdata('fleet');
        $fleet = $this->fleets->get($dto->id);
        $this->fleets->delete($fleet->id);
        $this->session->unset_userdata('fleet');
        redirect('/fleet');
    }

}

?>