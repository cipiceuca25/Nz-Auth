<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account_details_model extends CI_Model
{

    function get_by_account_id($account_id)
    {
        return $this -> db -> get_where('account_details', array('account_id' => $account_id)) -> row();
    }

    function update($account_id, $attributes = array())
    {
        if (isset($attributes['fullname']))
            if (strlen($attributes['fullname']) > 160)
                $attributes['fullname'] = substr($attributes['fullname'], 0, 160);
        
        if (isset($attributes['dateofbirth']))
        {
            $this -> load -> helper('date');
            $attributes['dateofbirth'] = mdate('%Y-%m-%d', strtotime($attributes['dateofbirth']));
        }
        
        if (isset($attributes['gender']))
        {
            switch(strtolower($attributes['gender']))
            {
                case 'f' :
                case 'female' :
                    $attributes['gender'] = 'f';
                    break;
                case 'm' :
                case 'male' :
                    $attributes['gender'] = 'm';
                    break;
            }
        }

        // Update
        if ($this -> get_by_account_id($account_id))
        {
            $this -> db -> where('account_id', $account_id);
            $this -> db -> update('account_details', $attributes);
        }
        // Insert
        else
        {
            $attributes['account_id'] = $account_id;
            $this -> db -> insert('account_details', $attributes);
        }
    }

}