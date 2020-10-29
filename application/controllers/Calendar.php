<?php
	class Calendar extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('calendar_model');
			$this->load->helper('url_helper');
			$this->load->library(array('session'));
			$this->load->helper(array('url'));
		}

		public function calendarHome()
		{
			$data['calendar'] = $this->calendar_model->get_calenderData();
			$data['section'] = $this->calendar_model->get_section();

			// user login ok
			$this->load->view('header');
			$this->load->view('calendar/calendarHome', $data);
			$this->load->view('footer');
		}


	}
?>