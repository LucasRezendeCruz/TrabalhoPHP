<?php

namespace App\Models;

class DepartamentoModel extends BaseModel
{
    protected $table = 'departamento';
    protected $primaryKey = 'id';

    protected $allowedFields = ['descricao', 'statusRegistro'];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $validationRules = [
        'descricao' => [
            "label" => 'Descrição',
            'rules' => 'required|min_length[3]|max_length[50]'
        ],
        'statusRegistro' => [
            'label' => 'Status',
            'rules' => 'required|integer'
        ]
    ];

    /**
     * getMenuDepartamento
     *
     * @return void
     */
    public function getMenuDepartamento()
    {
        session()->set(
            "aMenuDepartamento",
            $this->select('id, descricao')
                ->where('statusRegistro', 1)
                ->orderBy('descricao')
                ->findAll()
        );
        
    }
}