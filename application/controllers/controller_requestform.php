<?php

class Controller_Requestform extends Controller
{

	function __construct()
	{
		$this->model = new Model_Requestform();
		$this->view = new View();
	}
	
	function action_index($par)
	{
		$data = $this->model->get_data($par);		
		$this->view->generate('requestform_view.php', 'template_view.php', $data);
	}
}
