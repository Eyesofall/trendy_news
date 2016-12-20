<?php

class Emails Extends Frontend_Controller {

    function email(){
        $emails = $this->user->get_emails();
        $this->load->lbrary('email');
        foreach ($emails as $row){
            if($row['email']){
                $this->email->from('admin@sitename.com', 'Lord Smiles');
                $this->email->to($row['email']);
                $this->email->subject('Test Newsletter');
                $this->email->message('Your email message goes here!');
                $this->email->send();
                $this->email->clear();
            }
        }
    }

    // Create the function below in the user model
    /*function get_emails(){
        $this->db->select('email')->from('users');
        $query = $this->db-get();
        return $query->result_array();
    }*/

    
}