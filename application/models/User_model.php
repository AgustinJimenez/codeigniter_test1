<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        
    }
/*
    public function get($columns_selected = '*')
    {
        return $this->db
        ->select( $columns_selected )
        ->from( $this->table )
        ->get()
        ->result_array();
    }
*/
}