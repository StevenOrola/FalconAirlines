<?php
class Airplanes extends CSV_Model
	{
		public function __construct()
	    {
            parent::__construct(APPPATH . '../data/Airplanes.csv', 'id');
	    }
	    function getCategorizedTasks()
		{
		    // extract the undone airlines
		    foreach ($this->all() as $airplane)
		    {
		        if ($airplane->status != 2)
		            $undone[] = $airplane;
		    }
		    // // substitute the category name, for sorting
		    // foreach ($undone as $airline)
		    //     $airline->group = $this->app->group($airline->group);
		    // order them by category
		    usort($undone, 'orderByCategory');
		    // convert the array of airplane objects into an array of associative objects       
		    foreach ($undone as $airplane)
		        $converted[] = (array) $airplane;
			return $converted;
		}
    
		// retrieve a single quote, null if not found
		public function get($which)
		{
			return !isset($this->data[$which]) ? null : $this->data[$which];
		}
	}
?>