<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produto extends Migration
{
    public function up()
    {
        $this->forge->addField([
                "id"    => [
                    'type'              => 'INT',
                    'constraint'        => 11,
                    'auto_increment'    => true,
                ],
                'descricao' => [
                    'type'              => 'VARCHAR',
                    'constraint'        => 100,
                ],
                'detalhamento' => [
                    'type'              => 'text',
                ],
                'departamento_id' => [
                    'type'              => 'INT',
                    'constraint'        => 11,
                    'unsigned'          => true,
                ],
                'precoVenda' => [
                    'type'              => 'DECIMAL',
                    'constraint'        => '12, 2',
                ],
                'statusRegistro' => [
                    'type'              => 'INT',
                    'constraint'        => 11,
                    'comment'           => '1=Ativo;2=Inativo;3=Indisponível',
                ],
                'altura' => [
                    'type'              => 'INT',
                    'constraint'        => 11,
                    'null'              => true,
                ],
                'largura' => [
                    'type'              => 'INT',
                    'constraint'        => 11,
                    'null'              => true,
                ],
                'profundidade' => [
                    'type'              => 'INT',
                    'constraint'        => 11,
                    'null'              => true,
                ],
                'pesoBruto' => [
                    'type'              => 'DECIMAL',
                    'constraint'        => '14, 3',
                ],
                'totalCurtida' => [
                    'type'              => 'INT',
                    'constraint'        => 11,
                    'null'              => true,
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

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('departamento_id', 'departamento', 'id');

        $this->forge->createTable('produto', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('produto');
    }
}
