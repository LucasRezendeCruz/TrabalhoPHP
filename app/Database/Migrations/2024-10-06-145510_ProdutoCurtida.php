<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdutoCurtida extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                'type'              => 'INT',
                'constraint'        => 11,
                'auto_increment'    => true,
                'null'              => false,
            ],
            "produto_id" => [
                'type'              => 'INT',
                'constraint'        => 11,
                'null'              => false,
            ],
            "usuario_id" => [
                'type'              => 'INT',
                'constraint'        => '11',
                'null'              => false,
            ],
            "created_at" => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            "updated_at" => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            "deleted_at" => [
                'type'              => 'DATETIME',
                'null'              => true,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('produtocurtida', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('prudutocurtida');
    }
}
