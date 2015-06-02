<?php

class Controller_Test extends Controller
{

	function __construct()
	{
		$this->model = new Model_Test();
		$this->view = new View();
	}
	
	function action_index($par)
	{
		$data = $this->model->get_data($par);		
		$this->view->generate('test_view.php', 'template_view.php', $data);
	}
}
