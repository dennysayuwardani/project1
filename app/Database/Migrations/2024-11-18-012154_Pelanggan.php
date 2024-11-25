<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelanggan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => false,
                'auto_increment' => true,
            ],
            'nama_pelanggan'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'alamat_pelanggan'   => [
                'type'           => 'TEXT',
            ],
            'no_telp' => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);
        //primary key
        $this->forge->addKey('id_pelanggan', true);
        //nama tabel
        $this->forge->createTable('pelanggan');
    }

    public function down()
    {
        $this->forge->dropTable('pelanggan');
    }
}
