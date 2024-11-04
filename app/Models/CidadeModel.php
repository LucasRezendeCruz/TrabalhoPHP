<?php

namespace App\Models;

class CidadeModel extends BaseModel
{
    protected $table = 'cidade';
    protected $primarykey = 'id';

    protected $allowedFields = ['uf_id', 'nome', 'codIBGE'];

    protected $useTimestamps  = true;
    //protected $useSoftDeletes = true;

    protected $validationRules = [
        "uf_id"  => [
            "label" => 'UF',
            "rules" => 'required'
        ],
        "nome"  => [
            "label" => 'Nome da Ciadde',
            "rules" => 'required|min_length[3]|max_length[60]'
        ],
        "codIBGE"  => [
            "label" => 'Código do IBGE da Cidade',
            "rules" => 'required'
        ]
    ];

    /**
     * getUf
     *
     * @param string $sigla 
     * @return array
     */
    public function getCidade($uf, $cidade) 
    {
        $dados = $this->join("uf", "uf.id = cidade.uf_id")->where(["uf.sigla" => $uf, "cidade.nome" => $cidade])->first();
        
        if (is_null($dados)) {

            if ($uf == "MG" and $cidade == "Muriae") {

                $UfModel = new UfModel();

                $aUf = $UfModel->getUf("MG");

                $this->save([
                    "uf_id" => $aUf['id'],
                    "nome" => $cidade,
                    "codIBGE" => "3143906"
                ]);

                return $this->join("uf", "uf.id = cidade.uf_id")->where(["uf.sigla" => $uf, "cidade.nome" => $cidade])->first();

            } else {
                return [];
            }            

        } else {
            return $dados;
        }
    }
}