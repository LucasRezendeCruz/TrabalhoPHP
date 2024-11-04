<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FormaPagamento extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'descricao' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'tipo' => [
                'type'       => 'INT',
                'constraint' => 11,
                'comment'    => '1=Dinheiro; 2=Pix; 3=Boleto;',                
            ],
            'statusRegistro' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'comment'       => '1=Ativo; 2=Inativo;',
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

        $this->forge->addKey('id', true);
        $this->forge->addKey(['descricao', 'tipo', 'statusRegistro'], false, true);      
        
        $this->forge->createTable('formapagamento', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('formapagamento');
    }
}
