<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */
	function __construct()
	{
		parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = 'Falcon Airlines';
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';
	}

	/**
	 * Render this page
	 */
	function render($template = 'template')
	{
            
                // Build the menubar
		$this->data['menubar'] = $this->parser->parse('_menubar', $this->config->item('menu_choices'), true);
                
                // Determine the URL this page was requested as
		$this->data['origin'] = $this->uri->uri_string();

		// Establish the meat of the current page, as the "content" parameter.
		// Parse the requested content template (passed as the "pagebody" parameter) to do so.
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

		// And then parse the page template, which will pull in and position the
		// "meat" in its middle.
		$this->parser->parse('template', $this->data);
	}
        
        public function show($key)
        {		
            /*
		// shows the plane information page
		$this->data['pagebody'] = 'planes';
		
                //grabs the information of the specific plane
		$source = $this->info->get($key);
		
		$this->data['plane'] = $source;

		$this->data = array_merge($this->data, (array) $source);
		$this->render();*/
        }

}
