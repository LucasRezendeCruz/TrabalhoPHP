<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuario extends Migration
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
            "pessoa_id" => [
                'type'              => 'INT',
                'constraint'        => 11,
                'null'              => false,
            ],
            "nome" => [
                'type'              => 'VARCHAR',
                'constraint'        => '60',
                'null'              => false,
            ],
            "statusRegistro" => [
                'type'              => 'INT',
                'constraint'        => '11',
                'null'              => false,
                'comment'           => '1=Ativo;2=Inativo',
                'default'           => '1',
            ],
            "nivel" => [
                'type'              => 'INT',
                'constraint'        => '11',
                'null'              => false,
                'comment'           => '1=Administrador;11=Cliente',
            ],
            "email" => [
                'type'              => 'VARCHAR',
                'constraint'        => '150',
                'null'              => false,
            ],
            "senha" => [
                'type'              => 'VARCHAR',
                'constraint'        => '250',
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
        $this->forge->addKey('pessoa_id', false, true);
        $this->forge->createTable('usuario', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('usuario');
    }
}

