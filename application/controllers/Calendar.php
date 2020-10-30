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


		public function addCalendarEvent()
		{
			// create the data object
			$data = new stdClass();

			// load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');

			echo $this->input->post("date1");//getting single data
        	print_r($this->input->post());exit;//This one is not working.
			// set validation rules
			//$this->form_validation->set_rules('')
			/*
			  $event = trim($_REQUEST['eventdata']);
			  $description = trim($_REQUEST['eventdesc']);
			  $description ;
			  $section = $_REQUEST['section'] ;
			  $date = $_REQUEST['date'] ;
			  $newDate = date("Y-m-d", strtotime($date));
			  $starttime = $_REQUEST['starttime'] ;
			  $endtime =  $_REQUEST['endtime'] ;
			 */
		}


	}
?>