<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PessoaEndereco extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"    => [
                'type'              => 'INT',
                'constraint'        => 11,
                'auto_increment'    => true,
            ],
            'pessoa_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
            ],
            'tipoEndereco' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'comment'           => '1=Cobrança;2=Endereço Entrega',
            ],
            'logradouro' => [
                'type'              => 'VARCHAR',
                'constraint'        => 60,
                'null'              => true,
            ],
            'numero' => [
                'type'              => 'VARCHAR',
                'constraint'        => 10,
                'null'              => true,
            ],
            'complemento' => [
                'type'              => 'VARCHAR',
                'constraint'        => 20,
                'null'              => true,
            ],

            'bairro' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40,
                'null'              => true,
            ],
            'cep' => [
                'type'              => 'VARCHAR',
                'constraint'        => 8,
                'null'              => true,
            ],
            'cidade_id' => [
                'type'              => 'INT',
                'constraint'        => 10,
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
        $this->forge->addForeignKey('pessoa_id', 'pessoa', 'id');
        $this->forge->addForeignKey('cidade_id', 'cidade', 'id');

        $this->forge->createTable('pessoaendereco', false, ['ENGINE' => 'InnoDB']);

    }

    public function down()
    {
        $this->forge->dropTable('pessoaendereco');
    }
}