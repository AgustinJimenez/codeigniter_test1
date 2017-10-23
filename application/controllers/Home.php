<?php
class Home extends MY_Controller 
{

    public function index()
    {
        $this->to_simple_template( 'pages/home/welcome_message' );
    }
}