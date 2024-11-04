<?php

namespace App\Models;

class UfModel extends BaseModel
{
    protected $table = 'uf';
    protected $primarykey = 'id';

    protected $allowedFields = ['sigla', 'descricao', 'regiao', 'codIBGE'];

    protected $useTimestamps  = true;
    //protected $useSoftDeletes = true;

    protected $validationRules = [
        "sigla"  => [
            "label" => 'UF',
            "rules" => 'required'
        ],
        "descricao"  => [
            "label" => 'Nome da UF',
            "rules" => 'required|min_length[3]|max_length[60]'
        ],
        "regiao"  => [
            "label" => 'Região',
            "rules" => 'required|integer'
        ],
        "codIBGE"  => [
            "label" => 'Código do IBGE da UF',
            "rules" => 'required|min_length[2]|max_length[2]'
        ]
    ];

    /**
     * getUf
     *
     * @param string $sigla 
     * @return array
     */
    public function getUf($sigla) 
    {
        $dados = $this->where("sigla", $sigla)->first();

        if (is_null($dados)) {

            if ($sigla == "MG") {

                $this->save([
                    "sigla" => "MG",
                    "descricao" => "Minas Gerais",
                    "regiao" => 3,
                    "codIBGE" => "31"
                ]);

                return $this->where("sigla", "MG")->first();

            } else {
                return [];
            }            

        } else {
            return $dados;
        }
    }
}