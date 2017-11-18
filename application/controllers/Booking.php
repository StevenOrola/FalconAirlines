<?php
class Booking extends Application
{	
    function __construct() 
    {
        parent::__construct();
    }
    public function index() 
    {
        $this->load->model('Flights');
        $this->data = $this->Flights->all();
        // populate lists options
        foreach ($this->data['airports'] as $key => $record)
            $this->data['options'][] = array('name' => $record['airport'], 'key' => $key);
        sort($this->data['options']);
        // this helps
        $from = $this->input->post('from');
        $to   = $this->input->post('to');
        
        // prepop
        $this->data['base']      = isset($from) ? getAirport($from, $this->data) : '';
        $this->data['target']    = isset($to) ? getAirport($to, $this->data) : '';
        $this->data['results'][] = array('1' => '', '2' => '', '3' => '');
        
        // get search results
        foreach ($this->data['airlines'] as $record)
            if(match($from, $to, $record))
            {
                $this->data['base']      = getAirport($from, $this->data);
                $this->data['target']    = getAirport($to, $this->data);
                $this->data['results'][] = array(
                    '1'    => getAirport($record['dest1'], $this->data),
                    '2'    => $record['dest2'] == $to || $record['dest3'] == $to ? getAirport($record['dest2'], $this->data) : '',
                    '3'    => $record['dest3'] == $to ? getAirport($record['dest3'], $this->data) : ''
                );
            }
            
        $this->data['pagebody']  = 'booking';
        $this->data['pagetitle'] = 'Search Flight';
        $this->render();
    }
}
function match($from, $to, $record)
{           
    return $record['base'] == $from
            
    && ($record['dest1'] == $to || $record['dest2'] == $to || $record['dest3'] == $to);   
}
function getAirport($key, $source)
{
    return $source['airports'][$key]['airport'];
}
?>	