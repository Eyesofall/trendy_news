<?php

class Video extends Admin_Controller {

    //----------------------------------------------------------------------------------------------------------------

    public function __construct() {
        parent::__construct();
        $this->load->model('video_m');
    }

    //----------------------------------------------------------------------------------------------------------------
    public function index() {
        // Fetch all videos
        $this->data['videos'] = $this->video_m->get();

        // Load view
        $this->data['subview'] = 'admin/video/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    //----------------------------------------------------------------------------------------------------------------

    public function edit($video_id = NULL) {

        // Fetch a video or set a new one
        if($video_id) {
            $this->data['video'] = $this->video_m->get($video_id);
            count($this->data['video'] || $this->data['errors'] = 'video could not be found');
        } else {
            $this->data['video'] = $this->video_m->get_new();
        }

        // Set up the form
        $rules = $this->video_m->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if ($this->form_validation->run() == TRUE){
            $data = $this->video_m->array_from_post(array(
                'title',
                'slug'
            ));
            $youtube_url = $this->input->post('youtube_url');
            $data['youtube_id'] = $this->get_youtube_id($youtube_url);
            $this->video_m->save($data, $video_id);
            redirect('admin/video');
        }

        // Load the view
        $this->data['subview'] = 'admin/video/edit';
        $this->load->view('admin/_layout_main', $this->data);

    }

    //----------------------------------------------------------------------------------------------------------------

    public function delete($video_id) {
        $this->video_m->delete($video_id);
        redirect('admin/video');
    }

    //----------------------------------------------------------------------------------------------------------------

    public function get_youtube_id($url){
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        $id = $my_array_of_vars['v'];
        $id||preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $id);
        return $id;
    }

    //----------------------------------------------------------------------------------------------------------------
}