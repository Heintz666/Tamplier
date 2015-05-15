<?php
class Controller_Login_out extends Controller
{
	
	    function __construct()
    {
        $this->model = new Model_Login_out();
    }
	    
    function action_index()
    {
        $data = $this->model->get_data();		
    }
	
}

?>