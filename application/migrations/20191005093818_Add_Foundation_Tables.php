<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Foundation_Tables extends CI_Migration {
    public function up()
    {
        // Drop table 'jobs' if it exists
        $this->dbforge->drop_table('jobs', TRUE);
        // Table Structure for jobs
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'type' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'company' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => FALSE
            ),
            'logo' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'url' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'position' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => FALSE
            ),
            'location' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
                'null' => FALSE
            ),
            'how_to_apply' => array(
                'type' => 'TEXT',
                'null' => TRUE,
                'null' => FALSE
            ),
            'token' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'public' => array(
                'type' => 'BOOLEAN',
                'null' => FALSE,
            ),
            'activated' => array(
                'type' => 'BOOLEAN',
                'null' => FALSE,
            ),
            'email' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE,
            ),
            'expires_at' => array(
                'type' => 'DATETIME',
                'null' => true,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => FALSE,
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
            ),
            'category_id' => array(
                'type'       => 'INT',
                'constraint' => '11',
                'unsigned'   => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('jobs');

        $this->db->query('
            ALTER TABLE jobs
            ADD KEY FK_category_id (category_id)
        ');

        // Drop table 'categories' if it exists
        $this->dbforge->drop_table('categories', TRUE);
        // Table Structure for categories
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100',
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('categories');

        // Drop table 'affiliates_categories' if it exists
        $this->dbforge->drop_table('affiliates_categories', TRUE);
        // Table Structure for affiliates_categories
        $this->dbforge->add_field(array(
            'category_id' => array(
                'type'       => 'INT',
                'constraint' => 5,
            ),
            'affiliate_id' => array(
                'type'       => 'INT',
                'constraint' => 5,
            )
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('affiliates_categories');

        // Drop table 'affiliates' if it exists
        $this->dbforge->drop_table('affiliates', TRUE);
        // Table Structure for affiliates
        $this->dbforge->add_field(array(
            'id' => array(
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ),
            'url' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'email' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'token' => array(
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ),
            'token' => array(
                'type' => 'BOOLEAN',
                'null' => FALSE,
            ),
            'created_at' => array(
                'type' => 'DATETIME',
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('affiliates');
}

    public function down()
    {
        $this->dbforge->drop_table('jobs');
        $this->dbforge->drop_table('categories');
        $this->dbforge->drop_table('affiliates_categories');
        $this->dbforge->drop_table('affiliates');
    }
}
