<?php

class Video_m extends MY_Model {

    protected $_table_name = 'videos';
    protected $_primary_key = 'video_id';
    protected $_order_by = 'video_id desc';
    protected $_timestamps = TRUE;

    public $rules = array(
        'youtube_url' => array(
            'field' => 'youtube_url',
            'label' => 'Youtube URL',
            'rules' => 'trim|required'),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]'),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|max_length[100]|url_title'),
    );

    //---------------------------------------------------------------------------------------------------------------

    public function get_new(){
        $video = new stdClass();
        $video->title = '';
        $video->slug = '';
        $video->youtube_id = '';
        return $video;
    }

    //---------------------------------------------------------------------------------------------------------------


    //---------------------------------------------------------------------------------------------------------------

}