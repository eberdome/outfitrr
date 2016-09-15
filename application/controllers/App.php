<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{
		$this->load->view('app_view');
	}

	public function get_list()
	{
		$this->load->model(array('user_model'));
		$data = $this->user_model->getAll();
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
