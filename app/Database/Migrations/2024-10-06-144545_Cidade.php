<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cidade extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'uf_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'codIBGE' => [
                'type'          => 'VARCHAR',
                'constraint'    => '7',
                'null'          => true,
            ],
            'created_at' => [
                'type'      => 'DATETIME',
                'null'      => true,
            ],
            'updated_at' => [
                'type'      => 'DATETIME',
                'null'      => true,
            ],
            'deleted_at' => [
                'type'      => 'DATETIME',
                'null'      => true,
            ],
        ]);

        $this->forge->addKey('id', true);               // criando a chave primaria
        $this->forge->addKey(['nome', 'uf_id'], false, true);   // Criando a chave única   
    
        // Criando o relacionamento (chave estrangeira) entre cidade e UF
        $this->forge->addForeignKey("uf_id", "uf", "id", "NO ACTION", "NO ACTION");
        
        // Criando a table
        $this->forge->createTable('cidade', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('cidade');
    }
}
