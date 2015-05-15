<?php

class Controller_Contacts extends Controller
{

	function __construct()
	{
		$this->model = new Model_Contacts();
		$this->view = new View();
	}
	
	function action_index($par)
	{
		$data = $this->model->get_data($par);		
		$this->view->generate('contacts_view.php', 'template_view.php', $data);
	}
}
