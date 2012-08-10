<?php

class Home extends CI_Controller {
	
	function index()
	{
		$data = $this->data;
		$this->load->view('home', isset($data) ? $data : NULL);
	}
	
}