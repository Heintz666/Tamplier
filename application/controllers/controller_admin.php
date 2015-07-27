<?php

class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin();
		$this->view = new View();
	}
	
	function action_index($par)
	{
		
		$data = $this->model->get_data($par);		
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}
	
	function action_users($par)
	{
		$data = $this->model->get_data($par);		
		$this->view->generate('adminusers_view.php', 'template_view.php', $data);
	}
	
	function action_posts($par)
	{
		$data = $this->model->get_data($par);		
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}
	
	function action_comments($par)
	{
		$data = $this->model->get_data($par);		
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}
	
	function action_gallery($par)
	{
		$data = $this->model->get_data($par);		
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}
	
	
}
