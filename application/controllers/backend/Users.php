<?php 

    defined('BASEPATH') or exit('No direct script access allowed');

    class Users extends My_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->ajax_only();

            $this->load->database();
            $this->load->model('user_model', 'users');
        }

        public function index()
        {
            $users = $this->users->get( ['user_id', 'username', 'email', 'auth_level', 'last_login'] );

           // dd( $this->users->get(['user_id', 'username', 'email', 'auth_level', 'last_login']) );

            $this->load->view('pages/admin/users/index', compact('users'));
        }





    }