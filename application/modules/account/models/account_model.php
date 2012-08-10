<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Account_model extends CI_Model
    {

        function get_by_id($account_id)
        {
            return $this -> db -> get_where('account', array('id' => $account_id)) -> row();
        }

        function get_by_username($username)
        {
            return $this -> db -> get_where('account', array('username' => $username)) -> row();
        }

        function get_by_email($email)
        {
            return $this -> db -> get_where('account', array('email' => $email)) -> row();
        }

        function get_by_username_email($username_email)
        {
            return $this -> db -> from('account') -> where('username', $username_email) -> or_where('email', $username_email) -> get() -> row();
        }

        function create($username, $email = NULL, $password = NULL)
        {
            // Create password hash using phpass
            if ($password !== NULL)
            {
                $pass = rand(2351943, 3049525934045) + rand(2034052, 102054385359);
            }

            $this -> load -> helper('account/phpass');
            $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
            $hashed_password = $hasher -> HashPassword($password);

            $this -> load -> helper('date');
            $this -> db -> insert('account', array('username' => $username, 'email' => $email, 'password' => isset($hashed_password) ? $hashed_password : NULL, 'createdon' => mdate('%Y-%m-%d %H:%i:%s', now())));

            return $this -> db -> insert_id();
        }

        function update_username($account_id, $new_username)
        {
            $this -> db -> update('account', array('username' => $new_username), array('id' => $account_id));
        }

        function update_email($account_id, $new_email)
        {
            $this -> db -> update('account', array('email' => $new_email), array('id' => $account_id));
        }

        function update_password($account_id, $password_new)
        {
            $this -> load -> helper('account/phpass');
            $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
            $new_hashed_password = $hasher -> HashPassword($password_new);

            $this -> db -> update('account', array('password' => $new_hashed_password), array('id' => $account_id));
        }

        function update_last_signed_in_datetime($account_id)
        {
            $this -> load -> helper('date');

            $this -> db -> update('account', array('lastsignedinon' => mdate('%Y-%m-%d %H:%i:%s', now())), array('id' => $account_id));
        }

        function update_reset_sent_datetime($account_id)
        {
            $this -> load -> helper('date');

            $resetsenton = mdate('%Y-%m-%d %H:%i:%s', now());

            $this -> db -> update('account', array('resetsenton' => $resetsenton), array('id' => $account_id));

            return strtotime($resetsenton);
        }

        function remove_reset_sent_datetime($account_id)
        {
            $this -> db -> update('account', array('resetsenton' => NULL), array('id' => $account_id));
        }

        function update_deleted_datetime($account_id)
        {
            $this -> load -> helper('date');

            $this -> db -> update('account', array('deletedon' => mdate('%Y-%m-%d %H:%i:%s', now())), array('id' => $account_id));
        }

        function remove_deleted_datetime($account_id)
        {
            $this -> db -> update('account', array('deletedon' => NULL), array('id' => $account_id));
        }

        function update_suspended_datetime($account_id)
        {
            $this -> load -> helper('date');

            $this -> db -> update('account', array('suspendedon' => mdate('%Y-%m-%d %H:%i:%s', now())), array('id' => $account_id));
        }

        function remove_suspended_datetime($account_id)
        {
            $this -> db -> update('account', array('suspendedon' => NULL), array('id' => $account_id));
        }

    }
