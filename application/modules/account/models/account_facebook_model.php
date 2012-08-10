<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Account_facebook_model extends CI_Model
    {

        function get_by_account_id($account_id)
        {
            return $this -> db -> get_where('account_facebook', array('account_id' => $account_id)) -> result();
        }

        function get_by_facebook_id($facebook_id)
        {
            return $this -> db -> get_where('account_facebook', array('facebook_id' => $facebook_id)) -> row();
        }

        function insert($account_id, $facebook_id)
        {
            $this -> load -> helper('date');

            if (!$this -> get_by_facebook_id($facebook_id))// ignore insert
            {
                $this -> db -> insert('account_facebook', array('account_id' => $account_id, 'facebook_id' => $facebook_id, 'linkedon' => mdate('%Y-%m-%d %H:%i:%s', now())));
                return TRUE;
            }
            
            return FALSE;
        }

        function delete($facebook_id)
        {
            $this -> db -> delete('account_facebook', array('facebook_id' => $facebook_id));
        }

    }
