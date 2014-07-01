<?php
class Events extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('events_model');
	}

	public function index($page = 1)
	{
		$data['events'] = $this->events_model->get_events($page);
		$data['title'] = 'Upcoming Events';

		$this->load->view('templates/header', $data);
		$this->load->view('events/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($id)
	{
		$data['events_item'] = $this->events_model->single_event($id);

		if (empty($data['events_item']))
		{
			echo "oops! no data!";
			//show_404();
		}

		$data['title'] = $data['events_item']['title'];

		$this->load->view('templates/header', $data);
		$this->load->view('events/view', $data);
		$this->load->view('templates/footer');
	}
	
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Create a new event';
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('date', 'date', 'trim|required|valid_date[m/d/y,/]');
		$this->form_validation->set_rules('date', 'date', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);	
			$this->load->view('events/create');
			$this->load->view('templates/footer');
			
		}
		else
		{
			$this->events_model->set_events();
			$this->load->view('events/createsuccess');
		}
	}
	
	public function edit($id){

		$data['events_item'] = $this->events_model->single_event($id);

		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['title'] = 'Edit an event';
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('date', 'date', 'trim|required|valid_date[m/d/y,/]');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);	
			$this->load->view('events/edit');
			$this->load->view('templates/footer');
			
		}
		else
		{
			$this->events_model->update_events();
			$this->load->view('events/editsuccess');
		}
	}
	
	public function delete($id){
		$this->load->helper('form');
		
		if($id > 0){ //positive numbers have not been confirmed for deletion
			$data['events_item'] = $this->events_model->single_event($id);
			
			$this->load->view('events/delete', $data);
			
		}
		if($id < 0){ //negative numbers have been confirmed for deletion
			$this->events_model->delete_event($id);
			
			$this->load->view('events/deletesuccess');
		}
		//an id value of zero will not touch the db
	}
		
		
	
}
