<?php

class Migration_Create_audio_links extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'audio_id' => array(
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
            'artist' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'location' => array(
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
        $this->dbforge->add_key('audio_id', TRUE);
        $this->dbforge->create_table('audios');
    }

    public function down()
    {
        $this->dbforge->drop_table('audios');
    }
}