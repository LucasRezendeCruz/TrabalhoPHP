<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdutoImagem extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id"    => [
                'type'              => 'INT',
                'constraint'        => 11,
                'auto_increment'    => true,
            ],
            'nomeArquivo' => [
                'type'              => 'VARCHAR',
                'constraint'        => 120,                
            ],
            'produto_id' => [
                'type'              => 'INT',
                'constraint'        => 11,                
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
        $this->forge->addKey('nomeArquivo', false, true);
        $this->forge->addForeignKey('produto_id', 'produto', 'id');

        $this->forge->createTable('produtoimagem', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('produtoimagem');
    }
}
