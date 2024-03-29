<?php

    class Settings extends CI_Controller
    {

        function __construct()
        {
            parent::__construct();

            // Load
            $this -> load -> config('account/account');
            $this -> load -> helper(array('date', 'language', 'account/ssl', 'url'));
            $this -> load -> library(array('account/authentication', 'form_validation'));
            $this -> load -> model(array('account/account_model', 'account/account_details_model'));
            $this -> load -> language(array('general', 'account/settings'));
        }

        function index()
        {
            // Enable SSL?
            maintain_ssl($this -> config -> item("ssl_enabled"));

            // Redirect unauthenticated users to signin page
            if (!$this -> authentication -> is_signed_in())
            {
                redirect('account/signin/?continue=' . urlencode(base_url() . 'account/settings'));
            }

            // Retrieve sign in user
            $data['account'] = $this -> account_model -> get_by_id($this -> session -> userdata('account_id'));
            $data['account_details'] = $this -> account_details_model -> get_by_account_id($this -> session -> userdata('account_id'));

            // Split date of birth into month, day and year
            if ($data['account_details'] && $data['account_details'] -> dateofbirth)
            {
                $dateofbirth = strtotime($data['account_details'] -> dateofbirth);
                $data['account_details'] -> dob_month = mdate('%m', $dateofbirth);
                $data['account_details'] -> dob_day = mdate('%d', $dateofbirth);
                $data['account_details'] -> dob_year = mdate('%Y', $dateofbirth);
            }

            // Setup form validation
            $this -> form_validation -> set_error_delimiters('<div class="field_error">', '</div>');
            $this -> form_validation -> set_rules(array( array('field' => 'settings_email', 'label' => 'lang:settings_email', 'rules' => 'trim|required|valid_email|max_length[160]'), array('field' => 'settings_fullname', 'label' => 'lang:settings_fullname', 'rules' => 'trim|max_length[160]')));

            // Run form validation
            if ($this -> form_validation -> run())
            {
                // If user is changing email and new email is already taken
                if (strtolower($this -> input -> post('settings_email')) != strtolower($data['account'] -> email) && $this -> email_check($this -> input -> post('settings_email')) === TRUE)
                {
                    $data['settings_email_error'] = lang('settings_email_exist');
                }
                // Detect incomplete birthday dropdowns
                elseif (!(($this -> input -> post('settings_dob_month') && $this -> input -> post('settings_dob_day') && $this -> input -> post('settings_dob_year')) || (!$this -> input -> post('settings_dob_month') && !$this -> input -> post('settings_dob_day') && !$this -> input -> post('settings_dob_year'))))
                {
                    $data['settings_dob_error'] = lang('settings_dateofbirth_incomplete');
                } else
                {
                    // Update account email
                    $this -> account_model -> update_email($data['account'] -> id, $this -> input -> post('settings_email') ? $this -> input -> post('settings_email') : NULL);

                    // Update account details
                    if ($this -> input -> post('settings_dob_month') && $this -> input -> post('settings_dob_day') && $this -> input -> post('settings_dob_year'))
                        $attributes['dateofbirth'] = mdate('%Y-%m-%d', strtotime($this -> input -> post('settings_dob_day') . '-' . $this -> input -> post('settings_dob_month') . '-' . $this -> input -> post('settings_dob_year')));

                    $attributes['fullname'] = $this -> input -> post('settings_fullname') ? $this -> input -> post('settings_fullname') : NULL;
                    $attributes['gender'] = $this -> input -> post('settings_gender') ? $this -> input -> post('settings_gender') : NULL;

                    $this -> account_details_model -> update($data['account'] -> id, $attributes);

                    $data['settings_info'] = lang('settings_details_updated');
                }
            }

            $this -> load -> view('account/settings', $data);
        }

        function email_check($email)
        {
            return $this -> account_model -> get_by_email($email) ? TRUE : FALSE;
        }

    }
