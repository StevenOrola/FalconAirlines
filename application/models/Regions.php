<?php
	class Regions extends CSV_Model
	{
		public function __construct()
	    {
            parent::__construct(APPPATH . '../data/Regions.csv', 'id');
	    }
	    function getCategorizedTasks()
		{
		    // extract the undone airlines
		    foreach ($this->all() as $region)
		    {
		        if ($region->status != 2)
		            $undone[] = $region;
		    }
		    // // substitute the category name, for sorting
		    // foreach ($undone as $airline)
		    //     $airline->group = $this->app->group($airline->group);
		    // order them by category
		    usort($undone, 'orderByCategory');
		    // convert the array of region objects into an array of associative objects       
		    foreach ($undone as $region)
		        $converted[] = (array) $region;
			return $converted;
		}
    
	}
?>