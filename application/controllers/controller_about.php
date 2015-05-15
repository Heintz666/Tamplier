<?php

class Controller_About extends Controller
{

	function __construct()
	{
		$this->model = new Model_About();
		$this->view = new View();
	}
	
	function action_index($par)
	{
		$data = $this->model->get_data($par);		
		$this->view->generate('about_view.php', 'template_view.php', $data);
	}
}
