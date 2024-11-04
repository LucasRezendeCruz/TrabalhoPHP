<?php

namespace App\Models;

class ProdutoModel extends BaseModel
{
    protected $table = 'produto';
    protected $primaryKey = 'id';

    protected $allowedFields = ['descricao', 'detalhamento', 'departamento_id', 'precoVenda', 'statusRegistro'
                                , 'largura', 'altura', 'profundidade', 'pesoBruto', 'totalCurtida'];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $validationRules = [
        'descricao' => [
            "label" => 'Descrição',
            'rules' => 'required|min_length[3]|max_length[100]'
        ],
        'detalhamento' => [
            "label" => 'Detalhamento',
            'rules' => 'required|min_length[5]'
        ],
        'departamento_id' => [
            "label" => 'Departamento',
            'rules' => 'required|integer'
        ],
        'precoVenda' => [
            "label" => 'Preço de Venda',
            'rules' => 'required|decimal'
        ],
        'statusRegistro' => [
            'label' => 'Status',
            'rules' => 'required|integer'
        ],
        'largura' => [
            'label' => 'Largura',
            'rules' => 'required|integer'
        ],
        'altura' => [
            'label' => 'Altura',
            'rules' => 'required|integer'
        ],
        'profundidade' => [
            'label' => 'Profundidade',
            'rules' => 'required|integer'
        ],
        'pesoBruto' => [
            "label" => 'Peso Bruto',
            'rules' => 'required|decimal'
        ]
    ];

    /**
     * getListaProduto
     *
     * @return array
     */
    public function getListaProduto($aFilter = [], $ordernarPor = "descricao")  
    {
        $this->select("produto.*, departamento.descricao AS departamentoDescricao")
            ->join("departamento", "departamento.id = produto.departamento_id");
        
        if (count($aFilter) > 0) {
            $this->where($aFilter);
        }
        
        return $this->orderBy($ordernarPor)->paginate(3);
    }

    /**
     * getListaProduto
     *
     * @return array
     */
    public function getListaHome()  
    {
		$DepartamentoModel = new DepartamentoModel();
		$ProdutoModel = new ProdutoModel();
		$ProdutoImagemModel = new ProdutoImagemModel();

		$dados = $DepartamentoModel->where("statusRegistro", 1)->orderBy('descricao')->findAll();

		for ($yyy = 0; $yyy < count($dados); $yyy++) {

			$dados[$yyy]['aProduto'] = $this->select("produto.*, departamento.descricao AS departamentoDescricao")
                                            ->join("departamento", "departamento.id = produto.departamento_id")
                                            ->where([
                                                'produto.statusRegistro' => 1,
                                                'produto.departamento_id' => $dados[$yyy]['id']
                                            ])->orderBy("departamentoDescricao, descricao")
                                            ->findAll();
		
			for ($xxx = 0; $xxx < count($dados[$yyy]['aProduto']); $xxx++) {
				$dados[$yyy]['aProduto'][$xxx]['aImagem'] = $ProdutoImagemModel
                                                            ->where('produto_id', $dados[$yyy]['aProduto'][$xxx]['id'])
                                                            ->orderBy('nomeArquivo')
                                                            ->findAll();
			}

		}

        return $dados;
    }

    /**
     * deleteProduto
     *
     * @param integer $id 
     * @return boolean
     */
    public function deleteProduto($id)
    {
        $db = \Config\Database::connect();

        $dbAnexos   = $db->table("produtoimagem")->select("*")->where('produto_id' , $id)->get();
        $aAnexo     = $dbAnexos->getResultArray();

        $db->transBegin();      // Inicia controle de transação

        foreach ($aAnexo as $value) {

            // exclui a imagem na pasta do servidor
            if (file_exists(ROOTPATH .'public/uploads/produto/' . $value['nomeArquivo'])) {
                unlink(ROOTPATH .'public/uploads/produto/' . $value['nomeArquivo']);  // Apaga arquivo no servidor
            }

            // excluir registro da imagem na base de dados
            $dbAnexos   = $db->table("produtoimagem")->where("id", $value['id'])->delete();

        }

        // deleta produto
        $tbProduto = $db->table("produto");
        $tbProduto->where('id', $id)->delete();

        //

        if ($db->transStatus() === FALSE) {
            $db->transRollback();               // Defaz o que foi feito na base de dados
            return false;
        } else {
            $db->transCommit();                 // Confirmar a gravação dos dados na base dados
            return true;
        }
    }
}