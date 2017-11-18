<?php
	class Airports extends CSV_Model
	{
		public function __construct()
	    {
            parent::__construct(APPPATH . '../data/Airports.csv', 'id');
	    }
	    function getCategorizedTasks()
		{
		    // extract the undone airlines
		    foreach ($this->all() as $airport)
		    {
		        if ($airport->status != 2)
		            $undone[] = $airport;
		    }
		    // // substitute the category name, for sorting
		    // foreach ($undone as $airline)
		    //     $airline->group = $this->app->group($airline->group);
		    // order them by category
		    usort($undone, 'orderByCategory');
		    // convert the array of airport objects into an array of associative objects       
		    foreach ($undone as $airport)
		        $converted[] = (array) $airport;
			return $converted;
		}
    
	}
?>