<?php
  class calendar_model extends CI_Model {

    public function __construct()
    {
      $this->load->database();
    }

    public function get_calenderData()
    {
      //order_by(column_name, sort_type);
      //$query = $this->db->get('calendar');
      $this->db->select('*');
      $this->db->from('calendar');
      $this->db->order_by('datetime');
      $query = $this->db->get();

      return $query->result_array();
      
    }


    public function get_section()
     {

      $this->db->select('*');
      $this->db->from('section');
      $this->db->order_by('id');
      $query = $this->db->get();

      return $query->result_array();

     }

  }
?>