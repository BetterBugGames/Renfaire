<?php

class events_model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}
	
	public function get_events($page = 1){
		
		$interval = 5;
		$start = ($page - 1) * $interval;
		
		
		$query = $this->db->query("SELECT * FROM events WHERE unix_timestamp( ) < unix_timestamp( replace( events.date, '-', '' ) ) ORDER BY date LIMIT $start, $interval");
		return $query->result_array();
	}
	
	public function single_event($id){
		$query = $this->db->query('SELECT * FROM events WHERE id = '.$id.';');
	//	return $query->row_array();
		return $query->row_array();
	}
	
	public function set_events(){
		
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'date' => $this->input->post('date')
		);
		
		return $this->db->insert('events', $data);
	}
	
	public function update_events(){
		
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'date' => $this->input->post('date'),
			'id' => $this->input->post('id')
		);
		
		return $this->db->query('UPDATE events SET title = \''.$data['title'].'\', date = \''.$data['date'].'\', description = \''.$data['description'].'\' WHERE id = '.$data['id'].';');
//		return $this->db->insert('events', $data);
	}
	
	public function delete_event($id){
		$id *= -1;
		
		return $this->db->query('DELETE FROM events WHERE id = '.$id);
	}
	
}


