<?php

class Controller_Profile extends Controller
{

	function __construct()
	{
		$this->model = new Model_Profile();
		$this->view = new View();
	}
	
	function action_index($par)
	{
		$data = $this->model->get_data($par);		
		$this->view->generate('profile_view.php', 'template_view.php', $data);
	}
}
