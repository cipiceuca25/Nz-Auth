<?php

    class Password extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();

            // Load
            $this -> load -> config('account/account');
            $this -> load -> helper(array('date', 'language', 'account/ssl', 'url'));
            $this -> load -> library(array('account/authentication', 'form_validation'));
            $this -> load -> model(array('account/account_model'));
            $this -> load -> language(array('general', 'account/password'));
        }

        function index()
        {
            // Enable SSL?
            maintain_ssl($this -> config -> item("ssl_enabled"));

            // Redirect unauthenticated users to signin page
            if (!$this -> authentication -> is_signed_in())
            {
                redirect('account/signin/?continue=' . urlencode(base_url() . 'account/password'));
            }

            // Retrieve sign in user
            $data['account'] = $this -> account_model -> get_by_id($this -> session -> userdata('account_id'));

            ### Setup form validation
            $this -> form_validation -> set_error_delimiters('<span class="field_error">', '</span>');
            $this -> form_validation -> set_rules(array( array('field' => 'password_new_password', 'label' => 'lang:password_new_password', 'rules' => 'trim|required|min_length[6]'), array('field' => 'password_retype_new_password', 'label' => 'lang:password_retype_new_password', 'rules' => 'trim|required|matches[password_new_password]')));

            ### Run form validation
            if ($this -> form_validation -> run())
            {
                // Change user's password
                $this -> account_model -> update_password($data['account'] -> id, $this -> input -> post('password_new_password'));
                $this -> session -> set_flashdata('password_info', lang('password_password_has_been_changed'));

                redirect('account/password');
            }

            $this -> load -> view('account/password', $data);
        }

    }
