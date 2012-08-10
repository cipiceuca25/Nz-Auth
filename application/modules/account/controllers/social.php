<?php

    class Social extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();

            // Load
            $this -> load -> config('account/account');
            $this -> load -> helper(array('language', 'account/ssl', 'url'));
            $this -> load -> library(array('account/authentication', 'form_validation'));
            $this -> load -> model(array('account/account_model', 'account/account_facebook_model', 'account/account_twitter_model'));
            $this -> load -> language(array('general', 'account/social', 'account/connect_third_party'));
        }

        function index()
        {
            // Enable SSL?
            maintain_ssl($this -> config -> item("ssl_enabled"));

            // Redirect unauthenticated users to signin page
            if (!$this -> authentication -> is_signed_in())
            {
                redirect('account/signin/?continue=' . urlencode(base_url() . 'account/social'));
            }

            // Retrieve sign in user
            $data['account'] = $this -> account_model -> get_by_id($this -> session -> userdata('account_id'));

            // Delete a linked account
            if ($this -> input -> post('facebook_id') || $this -> input -> post('twitter_id'))
            {
                if ($this -> input -> post('facebook_id'))
                    $this -> account_facebook_model -> delete($this -> input -> post('facebook_id'));
                elseif ($this -> input -> post('twitter_id'))
                    $this -> account_twitter_model -> delete($this -> input -> post('twitter_id'));

                $this -> session -> set_flashdata('linked_info', lang('linked_linked_account_deleted'));
                redirect('account/social');
            }

            // Check for linked accounts
            $data['num_of_linked_accounts'] = 0;

            // Get Facebook accounts
            if ($data['facebook_links'] = $this -> account_facebook_model -> get_by_account_id($this -> session -> userdata('account_id')))
            {
                foreach ($data['facebook_links'] as $index => $facebook_link)
                {
                    $data['num_of_linked_accounts']++;
                }
            }

            // Get Twitter accounts
            if ($data['twitter_links'] = $this -> account_twitter_model -> get_by_account_id($this -> session -> userdata('account_id')))
            {
                $this -> load -> config('twitter');
                $this -> load -> helper('twitter');

                foreach ($data['twitter_links'] as $index => $twitter_link)
                {
                    $data['num_of_linked_accounts']++;
                    $epiTwitter = new EpiTwitter($this -> config -> item('twitter_consumer_key'), $this -> config -> item('twitter_consumer_secret'), $twitter_link -> oauth_token, $twitter_link -> oauth_token_secret);
                    $data['twitter_links'][$index] -> twitter = $epiTwitter -> get_usersShow(array('user_id' => $twitter_link -> twitter_id));
                }
            }

            $this -> load -> view('account/social', $data);
        }

    }
