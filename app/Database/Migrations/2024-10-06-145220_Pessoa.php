<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pessoa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"    => [
                'type'              => 'INT',
                'constraint'        => 10,
                'auto_increment'    => true,
            ],
            'nome' => [
                'type'              => 'VARCHAR',
                'constraint'        => 60,
            ],
            'ddd1' => [
                'type'              => 'VARCHAR',
                'constraint'        => 2,
                'null'              => true,
            ],
            'celular1' => [
                'type'              => 'VARCHAR',
                'constraint'           => 9,
                'null'              => true,
            ],
            'statusRegistro' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'comment'           => '1=Ativo;2=Inativo',
                'default'           => 1
            ],
            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'updated_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'deleted_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);

        $this->forge->addKey('id', true); // criando a chave primaria
        $this->forge->createTable('pessoa', false, ['ENGINE' => 'InnoDB']); // Criando a table
    }

    public function down()
    {
        $this->forge->dropTable('pessoa');
    }
}
