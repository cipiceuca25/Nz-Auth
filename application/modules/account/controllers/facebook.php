<?php

    class Facebook extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();

            // Load
            $this -> load -> config('account/account');
            $this -> load -> helper(array('language', 'account/ssl', 'url'));
            $this -> load -> library(array('account/authentication', 'account/facebook_lib'));
            $this -> load -> model(array('account/account_model', 'account_facebook_model'));
            $this -> load -> language(array('general', 'account/login', 'account/social', 'account/connect_third_party'));
        }

        function index()
        {
            // Enable SSL?
            maintain_ssl($this -> config -> item("ssl_enabled"));

            // Check if user is signed in on facebook
            if ($this -> facebook_lib -> user)
            {
                // Check if user has connect facebook
                if ($user = $this -> account_facebook_model -> get_by_facebook_id($this -> facebook_lib -> user['id']))
                {
                    // Check if user is not signed in
                    if (!$this -> authentication -> is_signed_in())
                    {
                        // Run sign in routine
                        $this -> authentication -> sign_in($user -> account_id);
                    }

                    $user -> account_id === $this -> session -> userdata('account_id') ? $this -> session -> set_flashdata('linked_error', sprintf(lang('linked_linked_with_this_account'), lang('connect_facebook'))) : $this -> session -> set_flashdata('linked_error', sprintf(lang('linked_linked_with_another_account'), lang('connect_facebook')));
                    redirect('account/social');
                }
                // The user has not connect facebook
                else
                {
                    // Check if user is signed in
                    if (!$this -> authentication -> is_signed_in())
                    {
                        // Store user's facebook data in session
                        $this -> session -> set_userdata('connect_create', array( array('provider' => 'facebook', 'provider_id' => $this -> facebook_lib -> user['id']), array('fullname' => $this -> facebook_lib -> user['name'], 'gender' => $this -> facebook_lib -> user['gender'], 'dateofbirth' => $this -> facebook_lib -> user['birthday'])));

                        // Create account
                        redirect('account/connect_create');
                    } else
                    {
                        // Connect facebook
                        $this -> account_facebook_model -> insert($this -> session -> userdata('account_id'), $this -> facebook_lib -> user['id']);
                        $this -> session -> set_flashdata('linked_info', sprintf(lang('linked_linked_with_your_account'), lang('connect_facebook')));

                        redirect('account/social');
                    }
                }
            }

            // Redirect to login url
            header("Location: " . $this -> facebook_lib -> fb -> getLoginUrl(array('req_perms' => 'user_birthday')));
        }

    }
