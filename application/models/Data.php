<?php

/**
 * This is a "CMS" model for quotes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author jim
 */
class Data extends CI_Model
{


	var $data = array(
		'1'	 => array('id'	 => 'Mel Brooks', 'role'	 => 'Yogurt',
			'what'	 => 'May the schwartz be with you!'),
		'2'	 => array('who'	 => 'John Candy', 'role'	 => 'Barf',
			'what'	 => 'It\'s her royal highness\'s matched luggage!'),
		'3'	 => array('who'	 => 'Rick Moranis', 'role'	 => 'Dark Helmet',
			'what'	 => 'Ludicrous Speed, Go!'),
		'4'	 => array('who'	 => 'Bill Pullman', 'role'	 => 'Lone Starr',
			'what'	 => 'Buckle up back there, we\'re going into..."Hyperactive"!'),
		'5'	 => array('who'	 => 'Joan Rivers', 'role'	 => 'Dot Matrix',
			'what'	 => 'Goodbye, virgin alarm.'),
		'6'	 => array('who'	 => 'George Wyner', 'role'	 => 'Colonel Sandurz',
			'what'	 => 'No, sir! I didn\'t see you playing with your dolls again!')
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();

		// inject each "record" key into the record itself, for ease of presentation
		foreach ($this->data as $key => $record)
		{
			$record['key'] = $key;
			$this->data[$key] = $record;
		}
	}

	// retrieve a single quote, null if not found
	public function get($which)
	{
		return !isset($this->data[$which]) ? null : $this->data[$which];
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}

}

