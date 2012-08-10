<?php

    class Logout extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();

            // Load
            $this -> load -> helper(array('language', 'url'));
            $this -> load -> config('account/account');
            $this -> load -> language(array('general', 'account/logout'));
            $this -> load -> library(array('account/authentication'));
        }

        function index()
        {
            // Redirect signed out users to homepage
            if (!$this -> authentication -> is_signed_in())
                redirect('');

            // Run sign out routine
            $this -> authentication -> sign_out();

            // Redirect to homepage
            if (!$this -> config -> item("sign_out_view_enabled"))
                redirect('');

            // Load sign out view
            $this -> load -> view('logout');
        }

    }
