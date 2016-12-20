<?php

class Audio extends Admin_Controller {

    //----------------------------------------------------------------------------------------------------------------

    public function __construct() {
        parent::__construct();
        $this->load->model('audio_m');
        $this->load->library('upload', $this->upload_config());
    }

    //----------------------------------------------------------------------------------------------------------------

    public function upload_config(){
        $config = array(
            'allowed_types' => 'mp3|wav|wma',
            'upload_path' => realpath(APPPATH . '../uploads/audio/'),
            'max_size' => 20000,
        );
        return $config;
    }
    
    //----------------------------------------------------------------------------------------------------------------
    
    public function index() {
        // Fetch all audios
        $this->data['audios'] = $this->audio_m->get();

        // Load view
        $this->data['subview'] = 'admin/audio/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    //----------------------------------------------------------------------------------------------------------------

    public function edit($audio_id = NULL) {

        // Fetch an audio or set a new one
        if($audio_id) {
            $this->data['audio'] = $this->audio_m->get($audio_id);
            count($this->data['audio'] || $this->data['errors'] = 'audio could not be found');
        } else {
            $this->data['audio'] = $this->audio_m->get_new();
        }

        // Set up the form
        $rules = $this->audio_m->rules;
        $this->form_validation->set_rules($rules);


        // Process the form
        if ($this->form_validation->run() == TRUE){

            // Upload file
            if (!$this->upload->do_upload('audio')){
                $this->data['errors'] = $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();

                // Post form data to database
                $data = $this->audio_m->array_from_post(array(
                    'title',
                    'artist'
                ));
                $data['location'] = $upload_data['full_path'];
                $data['slug'] = $upload_data['file_name'];

                $this->audio_m->save($data, $audio_id);
                redirect('admin/audio');
            }
        }

        // Load the view
        $this->data['subview'] = 'admin/audio/edit';
        $this->load->view('admin/_layout_main', $this->data);

    }

    //----------------------------------------------------------------------------------------------------------------

    public function delete($audio_id) {
        $this->audio_m->delete($audio_id);
        redirect('admin/audio');
    }

    //----------------------------------------------------------------------------------------------------------------

}