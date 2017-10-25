<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Users extends My_Controller
    {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function index()
        {
            $users = $this->Auth_model->
            dd()
        }





    }