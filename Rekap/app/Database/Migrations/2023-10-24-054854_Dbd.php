<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dbd extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'tgl_pemeriksaaan' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'nama_ibu_kandung' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],

            'alamat' => [
                'type' => 'TEXT',
            ],
            'alamat_domisili' => [
                'type' => 'TEXT',
            ],
            'tgl_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('dbd', true);
    }

    public function down()
    {
        //
    }
}
