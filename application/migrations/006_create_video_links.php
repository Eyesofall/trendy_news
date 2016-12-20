<?php

class Migration_Create_video_links extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'video_id' => array(
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
            'youtube_id' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'created' => array(
                'type' => 'DATETIME',
            ),
            'modified' => array(
                'type' => 'DATETIME',
            ),
        ));
        $this->dbforge->add_key('video_id', TRUE);
        $this->dbforge->create_table('videos');
    }

    public function down()
    {
        $this->dbforge->drop_table('videos');
    }
}