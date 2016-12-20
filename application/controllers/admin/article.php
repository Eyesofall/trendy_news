<?php

class Article extends Admin_Controller {

    //----------------------------------------------------------------------------------------------------------------

    public function __construct() {
        parent::__construct();
        $this->load->model('article_m');
        $this->load->library('upload', $this->upload_config());
    }

    //----------------------------------------------------------------------------------------------------------------

    public function upload_config(){
        $config = array(
            'allowed_types' => 'jpg|png|jpeg|gif',
            'upload_path' => realpath(APPPATH . '../uploads/image/'),
            'max_size' => 2000,
        );
        return $config;
    }

    //----------------------------------------------------------------------------------------------------------------
    // not in use
    public function resize_image($path, $file){
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 400;
        $config['height'] = 150;
        $config['new_image'] = realpath(APPPATH . '../uploads/image/thumb/').$file;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        //$this->resize_image($data['image_url'], $data['image_name']);
    }
    
    //----------------------------------------------------------------------------------------------------------------

    public function index() {
        // Fetch all articles
        $this->data['articles'] = $this->article_m->get();

        // Load view
        $this->data['subview'] = 'admin/article/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    //----------------------------------------------------------------------------------------------------------------


    public function edit($article_id = NULL) {
        
        // Fetch an article or set a new one
        if($article_id) {
            $this->data['article'] = $this->article_m->get($article_id);
            count($this->data['article'] || $this->data['errors'] = 'article could not be found');
        } else {
            $this->data['article'] = $this->article_m->get_new();
        }

        // Set up the form
        $rules = $this->article_m->rules;
        $this->form_validation->set_rules($rules);


        // Process the form
        if ($this->form_validation->run() == TRUE){

            // Upload image
            if (!$this->upload->do_upload('article_image')){
                $this->data['errors'] = $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();

                // Post form data to database
                $data = $this->article_m->array_from_post(array(
                    'title',
                    'slug',
                    'body',
                    'pubdate'
                ));
                $data['image_url'] = $upload_data['full_path'];
                $data['image_name'] = $upload_data['file_name'];

                $this->article_m->save($data, $article_id);
                redirect('admin/article');
            }

            
        }

        // Load the view
        $this->data['subview'] = 'admin/article/edit';
        $this->load->view('admin/_layout_main', $this->data);

    }

    //----------------------------------------------------------------------------------------------------------------

    public function delete($article_id) {
        $this->article_m->delete($article_id);
        redirect('admin/article');
    }

    //----------------------------------------------------------------------------------------------------------------

}