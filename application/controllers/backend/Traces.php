<?php 
    defined('BASEPATH') or exit('No direct script access allowed');

    class Traces extends My_Controller
    {
        protected $traces;

        public function __construct()
        {
            parent::__construct();
            
            //$this->ajax_only();
            //$this->load->database();
            //$this->load->model('users/user');
            //$this->user = $this->user_model;
            
        }

        public function index()
        {
            
            //$this->add_css('public/css/leaflet.css');
            //$this->add_js('public/js/leaflet.js');
            $this->load->view('pages/traces/index');
            //dump( $this->session->userdata(), $this->session->userdata('auth_user_id') );
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
                                        'updated_at' => date('Y-m-d H:i:s') 
                                    ]);
*/
/*
            $users = $this->user->get( ['user_id', 'username', 'email', 'auth_level', 'last_login'] );
            $this->load->view('pages/admin/users/index', compact('users', 'message'));
*/
        }
/*
        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->helper('custom_form');
            $this->set_form_rules();
        
            if ($this->form_validation->run() and count($_POST))
            {
                
                $this->user->fill( $_POST )
                ->save();

                $this->index(['type' => 'success', 'body' => 'User Saved Correctly']);
                //redirect('/admin/users', 'refresh');
            }
            else
                $this->load->view('pages/admin/users/create', ['user' => $this->user]);
            
        }

        public function edit( $id )
        {
            $user_to_edit = $this->user->find( $id );
            if( !$user_to_edit )
                $this->index(['type' => 'warning', 'body' => 'User not found']);

            $this->load->helper('form');
            $this->load->helper('custom_form');

            $this->load->view('pages/admin/users/edit', ['user' => $user_to_edit]);
        }

        public function update( $id )
        {

            $user_to_edit = $this->user->find( $id );
        
            if( !$user_to_edit )
                $this->index(['type' => 'warning', 'body' => 'User not found']);

            else if( $user_to_edit and !empty($_POST) )
            {
                $email_duplicated = $this->user->where('email', $_POST['email'])->where('user_id', '!=', $id)->exists();

                $this->load->library('form_validation');
                $this->set_form_rules( false );

                if ( $this->form_validation->run() and !$email_duplicated )
                {
                    $user_to_edit->fill( $_POST )->save();
                    $this->index(['type' => 'success', 'body' => 'User Saved Correctly']);
                }
                else
                {
                    $message = $email_duplicated?'Email already exist.':'';
    
                    $this->load->helper('form');
                    $this->load->helper('custom_form');
    
                    $this->load->view('pages/admin/users/edit', ['user' => $user_to_edit, 'message' => $message]);
                }
            }
        }

        public function change_password( $id )
        {
            if( empty( $_POST ) )
            {
                $this->load->helper('form');
                $this->load->helper('custom_form');
                $this->load->view('pages/admin/users/change_password', ['user' => $this->user->find( $id )]);
            }
            
        }

        function set_form_rules($email_unique = true)
        {
            if( $email_unique ) 
                $this->form_validation
                ->set_rules
                (
                    'email', 'Email', 'required|is_unique[users.email]', 
                    [
                        'required' => 'Email is required.',
                        'is_unique' => 'Email already exist.'
                    ]
                );
            else
                $this->form_validation
                ->set_rules
                (
                    'email', 'Email', 'required', 
                    [
                        'required' => 'Email is required.'
                    ]
                );

            $this->form_validation
            ->set_rules
            (
                'username', 'Username', 'required|min_length[5]',
                [
                    'min_length' => 'Username min characters = 5'
                ]
            );
        }
*/
    }
    