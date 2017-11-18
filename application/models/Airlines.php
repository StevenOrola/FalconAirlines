<?php
	// return -1, 0, or 1 of $a's category name is earlier, equal to, or later than $b's
	function orderByCategory($a, $b)
	{
	    if ($a->group < $b->group)
	        return -1;
	    elseif ($a->group > $b->group)
	        return 1;
	    else
	        return 0;
	}
	class Airlines extends CSV_Model
	{
		public function __construct()
	    {
            parent::__construct(APPPATH . '../data/Airlines.csv', 'id');
	    }
	    function getCategorizedTasks()
		{
		    // extract the undone airlines
		    foreach ($this->all() as $airline)
		    {
		        if ($airline->status != 2)
		            $undone[] = $airline;
		    }
		    // // substitute the category name, for sorting
		    // foreach ($undone as $airline)
		    //     $airline->group = $this->app->group($airline->group);
		    // order them by category
		    usort($undone, 'orderByCategory');
		    // convert the array of airline objects into an array of associative objects       
		    foreach ($undone as $airline)
		        $converted[] = (array) $airline;
			return $converted;
		}
    
	}
?>