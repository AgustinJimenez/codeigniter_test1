<?php 
    defined('BASEPATH') or exit('No direct script access allowed');

    class Users extends My_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->ajax_only();

            $this->load->database();
            $this->load->model('users/user');
        }

        public function index()
        {
  /*
            for ($i=0; $i < 10000; $i++) { 
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
            }
*/

            $users = $this->user->get( ['user_id', 'username', 'email', 'auth_level', 'last_login'] );
            $this->load->view('pages/admin/users/index', compact('users'));
        }





    }