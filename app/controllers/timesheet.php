<?php 

class Timesheet extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('timesheet');
	}
}