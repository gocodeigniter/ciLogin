<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

  const TABLE_NAME = "users";

  public function __construct()
  {
    $this->load->database();
  }

  public function countData()
  {
    return $this->db->count_all( self::TABLE_NAME );
  }

  public function store()
  {
    $name = htmlspecialchars( ucwords( $this->input->post('name') ) );
    $username = htmlspecialchars( $this->input->post('username') );
    $password = password_hash( $this->input->post('password'), PASSWORD_BCRYPT );

    $data = array(
      'name' => $name,
      'username' => $username,
      'password' => $password
    );

    $this->db->insert( self::TABLE_NAME, $data );
  }

}
