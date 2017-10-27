<?php 
    defined('BASEPATH') or exit('No direct script access allowed');

    class Users extends My_Controller
    {
        public function __construct()
        {
            parent::__construct();
            //$this->ajax_only();
            $this->load->database();
            $this->load->model('users/user');
        }

        public function index($message = null)
        {
/*
            for ($i=2440; $i < 500000; $i++) 
                $this->user->create([ 
                                        'user_id' => $i, 
                                        'username' => 'user-' . $i, 
                                        'email' => 'email@email' . $i . '.com',
                                        'auth_level' => ($i%2 == 0)?'9':'1', 
                                        'banned' => ($i%2 == 0)?'0':'1',  
                                        'passwd' => 'abc' . $i, 
                                       'passwd_recovery_code' => null,
                                       'passwd_recovery_date' => null, 
                                        'passwd_modified_at' => null, 
                                        'last_login' => date('Y-m-d H:i:s'), 
                                        'created_at' => date('Y-m-d H:i:s'),
                                        'modified_at' => date('Y-m-d H:i:s') 
                                    ]);
      */


            $users = $this->user->get( ['user_id', 'username', 'email', 'auth_level', 'last_login'] );
            $this->load->view('pages/admin/users/index', compact('users', 'message'));
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->helper('custom_form');
            
            $this->set_form_rules();

            if( count($_POST) )
                $this->user->fill( $_POST );

            if ($this->form_validation->run())
            {
                $this->user->save();
                $this->index(['type' => 'success', 'body' => 'User Saved Correctly']);
            }
            else
            {
                $this->load->view('pages/admin/users/form', ['user' => $this->user]);
            }
        }



        function set_form_rules()
        {
            $this->form_validation
            ->set_rules
            (
                'email', 'Email', 'required|is_unique[users.email]',
                [
                    'required' => 'The email is required.',
                    'is_unique' => 'The email already exist.'
                ]
            );

            $this->form_validation
            ->set_rules
            (
                'username', 'Username', 'min_length[5]',
                [
                    'min_length' => 'Username min characters = 5'
                ]
            );
        }

    }