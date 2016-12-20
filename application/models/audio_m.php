<?php

class Audio_m extends MY_Model {

    protected $_table_name = 'audios';
    protected $_primary_key = 'audio_id';
    protected $_order_by = 'audio_id desc';
    protected $_timestamps = TRUE;

    public $rules = array(
        'location' => array(
            'field' => 'location',
            'label' => 'Location',
            'rules' => 'trim'),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]'),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|max_length[100]|url_title'),
        'artist' => array(
            'field' => 'artist',
            'label' => 'Artist',
            'rules' => 'trim|required|max_length[100]'),
    );

    //---------------------------------------------------------------------------------------------------------------

    public function get_new(){
        $audio = new stdClass();
        $audio->title = '';
        $audio->slug = '';
        $audio->artist = '';
        $audio->location = '';
        return $audio;
    }

    //---------------------------------------------------------------------------------------------------------------


    //---------------------------------------------------------------------------------------------------------------

}