<?php

namespace App\Models;

class ProdutoImagemModel extends BaseModel
{
    protected $table = 'produtoimagem';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nomeArquivo', 'produto_id'];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $validationRules = [
        'nomeArquivo' => [
            "label" => 'Nome do Arquivo',
            'rules' => 'required|min_length[3]|max_length[120]'
        ],
        'produto_id' => [
            "label" => 'Produto',
            'rules' => 'required|integer'
        ]
    ];

    /**
     * insertImagem
     *
     * @param array $dados 
     * @return boolean
     */
    public function insertImagem($dados) 
    {
        $db = \Config\Database::connect();

        $dbProdutoImagem = $db->table("produtoimagem")->insert($dados);
        $id = $db->insertID();

        if ($id > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * deleteProdutoImagem
     *
     * @param integer $id 
     * @param string $nomeImagem 
     * @return boolean
     */
    public function deleteProdutoImagem($produto_id, $nomeImagem)
    {
        // exclui a imagem na pasta do servidor
        if (file_exists(ROOTPATH .'public/uploads/produto/' . $nomeImagem)) {
            unlink(ROOTPATH .'public/uploads/produto/' . $nomeImagem);  // Apaga arquivo no servidor
        }

        // excluir registro da imagem na base de dados
        if ($this->where(["nomeArquivo" => $nomeImagem, "produto_id" => $produto_id])->delete()) {
            return true;
        } else {
            return false;
        }
    }
}