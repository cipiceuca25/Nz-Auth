<?php
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Account_twitter_model extends CI_Model
    {

        function get_by_account_id($account_id)
        {
            return $this -> db -> get_where('account_twitter', array('account_id' => $account_id)) -> result();
        }

        function get_by_twitter_id($twitter_id)
        {
            return $this -> db -> get_where('account_twitter', array('twitter_id' => $twitter_id)) -> row();
        }

        function insert($account_id, $twitter_id, $oauth_token, $oauth_token_secret)
        {
            $this -> load -> helper('date');

            if (!$this -> get_by_twitter_id($twitter_id))// ignore insert
            {
                $this -> db -> insert('account_twitter', array('account_id' => $account_id, 'twitter_id' => $twitter_id, 'oauth_token' => $oauth_token, 'oauth_token_secret' => $oauth_token_secret, 'linkedon' => mdate('%Y-%m-%d %H:%i:%s', now())));
                return TRUE;
            }
            
            return FALSE;
        }

        function delete($twitter_id)
        {
            $this -> db -> delete('account_twitter', array('twitter_id' => $twitter_id));
        }

    }
