<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs_model extends CI_Model {
  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_jobs($search_string = NULL) {
    if ($search_string == null) {
      $query = "SELECT * FROM jobs WHERE DATE(NOW()) < DATE(job_sunset_date)";
    } else {
      $query = "SELECT * FROM jobs WHERE job_title LIKE ? OR `job_desc` LIKE ? AND DATE(NOW()) < DATE(job_sunset_date`)";
    }

    $result = $this->db->query($query, array($search_string, $search_string));
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }   

  public function get_job($job_id = NULL) {
    $query = "SELECT * FROM `jobs`, `categories`, `types`, `locations` WHERE `categories`.`cat_id` = `jobs`.`cat_id` AND `types`.`type_id` = `jobs`.`type_id` AND `locations`.`loc_id` = `jobs`.`loc_id` AND `job_id` = ? AND DATE(NOW()) < DATE(`job_sunset_date`)";
    
    $result = $this->db->query($query, array($job_id));
    if ($result) {
      return $result;
    } else {
      return false;
    }    
  } 

  public function save_job($save_data = NULL) {
    if ($this->db->insert('jobs', $save_data)) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function get_categories() {
    return $this->db->get('categories');
  }
  
  public function get_types() {
    return $this->db->get('types');
  }
  
  public function get_locations() {
    return $this->db->get('locations');
  }
}