<?php

class Frontend_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();

        // Load stuff
        $this->load->model('page_m');
        $this->load->model('article_m');
        $this->load->model('audio_m');
        $this->load->model('video_m');

        // Fetch navigation
        $this->data['menu'] = $this->page_m->get_nested();
        $this->data['news_archive_link'] = $this->page_m->get_archive_link();
        $this->data['recent_news'] = $this->article_m->get_recent();
        $this->data['meta_title'] = config_item('site_name');
    }
}
