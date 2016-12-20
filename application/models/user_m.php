<?php

class User_m extends MY_Model {

    //---------------------------------------------------------------------------------------------------------------
    
    protected $_table_name = 'users';
    protected $_primary_key = 'user_id';
    protected $_order_by = 'name';
    public $rules = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'),
    );

    public $rules_admin = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|callback__unique_email'),
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|matches[password_confirm]'),
        'password_confirm' => array(
            'field' => 'password_confirm',
            'label' => 'Confirm password',
            'rules' => 'trim|matches[password]'),
    );

    //---------------------------------------------------------------------------------------------------------------
    
    public function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = $this->hash($password);
        $user = $this->get_by(array('email' => $email, 'password' => $password), TRUE);
        
        if (count($user)) {
            // Lof in user
            $data = array(
                'name' => $user->name,
                'email' => $user->email,
                'user_id' => $user->user_id,
                'logged_in' => TRUE,
            );
            
            $this->session->set_userdata($data);
        }
        
    }

    //---------------------------------------------------------------------------------------------------------------

    public function get_new(){
        $user = new stdClass();
        $user->name = '';
        $user->email = '';
        $user->password = '';
        return $user;
    }

    //---------------------------------------------------------------------------------------------------------------
    
    public function logout(){
        
        $this->session->sess_destroy();
    }

    //---------------------------------------------------------------------------------------------------------------
    
    public function logged_in(){
        
        return (bool) $this->session->userdata('logged_in');
    }

    //---------------------------------------------------------------------------------------------------------------
    
    public function hash($string){
        
        return hash('sha512', $string . config_item('encryption_key'));
    }

    //---------------------------------------------------------------------------------------------------------------
    

}