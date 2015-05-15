<?php
class Controller_Login extends Controller
{
	
	    function __construct()
    {
        $this->model = new Model_Login();
    }
	    
    function action_index()
    {
        $data = $this->model->get_data();		
    }
	
}

?>