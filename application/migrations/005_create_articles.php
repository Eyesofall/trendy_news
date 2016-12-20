<?php

class Migration_Create_articles extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'article_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'image_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'pubdate' => array(
                'type' => 'DATE',
            ),
            'body' => array(
                'type' => 'TEXT',
                
            ),
            'created' => array(
                'type' => 'DATETIME',
            ),
            'modified' => array(
                'type' => 'DATETIME',
            ),
        ));
        $this->dbforge->add_key('article_id', TRUE);
        $this->dbforge->create_table('articles');
    }

    public function down()
    {
        $this->dbforge->drop_table('articles');
    }
}