<?php

class Page_m extends MY_Model {

    protected $_table_name = 'pages';
    protected $_primary_key = 'page_id';
    protected $_order_by = 'order';

    public $rules = array(
        'parent_id' => array(
            'field' => 'parent_id',
            'label' => 'Parent',
            'rules' => 'trim|intval'),
        'title' => array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required|max_length[100]'),
        'template' => array(
            'field' => 'template',
            'label' => 'Template',
            'rules' => 'trim|required'),
        'slug' => array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|max_length[100]|url_title|callback__unique_slug'),
        'body' => array(
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'trim|required'),
    );

    //---------------------------------------------------------------------------------------------------------------

    public function get_new(){
        $page = new stdClass();
        $page->title = '';
        $page->slug = '';
        $page->body = '';
        $page->template = 'page';
        $page->parent_id = 0;
        return $page;
    }

    //---------------------------------------------------------------------------------------------------------------

    public function delete($page_id){
        // Delete a page
        parent::delete($page_id);

        // Reset parent ID for its children
        $this->db->set(array('parent_id' => 0))->where('parent_id', $page_id)->update($this->_table_name);
    }

    //---------------------------------------------------------------------------------------------------------------

    public function save_order ($pages)
    {
        if (count($pages)) {
            foreach ($pages as $order => $page) {
                if ($page['item_id'] != '') {
                    $data = array('parent_id' => (int) $page['parent_id'], 'order' => $order);
                    $this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
                }
            }
        }
    }

    //---------------------------------------------------------------------------------------------------------------

    public function get_archive_link(){
        $page = parent::get_by(array('template' => 'news_archive'), TRUE);
        return isset($page->slug) ? $page->slug : '';
    }

    //---------------------------------------------------------------------------------------------------------------

    public function get_nested() {
        $this->db->order_by($this->_order_by);
        $pages = $this->db->get('pages')->result_array();
        
        $array = array();
        foreach ($pages as $page) {
            if (!$page['parent_id']) {
                $array[$page['page_id']] = $page;
            } else {
                $array[$page['parent_id']]['children'][] = $page;
            }
        }
        return $array;
    }

    //----------------------------------------------------------------------------------------------------------------

    public function get_with_parent($page_id = NULL, $single = FALSE){
        
        $this->db->select('pages.*, p.slug as parent_slug, p.title as parent_title');
        $this->db->join('pages as p', 'pages.parent_id=p.page_id', 'left');
        
        return parent::get($page_id, $single);
    }

    //---------------------------------------------------------------------------------------------------------------
    
    public function get_no_parents(){
        // Fetch pages without parents
        $this->db->select('page_id, title');
        $this->db->where('parent_id', 0);
        $pages = parent::get();

        // Return key => value pair array
        $array = array(0 => 'No parent');
        if (count($pages)) {
            foreach ($pages as $page) {
                $array[$page->page_id] = $page->title;
            }
        }

        return $array;
    }

    //---------------------------------------------------------------------------------------------------------------

}