<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartamentoModel;
use App\Models\ProdutoImagemModel;
use App\Models\ProdutoModel;

class Produto extends BaseController
{
    protected $ProdutoModel;
    protected $ProdutoImagemModel;

    /**
     * Método construstutor
     */
    public function __construct()
    {
        $this->ProdutoModel = new ProdutoModel();
        $this->ProdutoImagemModel = new ProdutoImagemModel();
    }

    /**
     * Carrega view com a lista Produtos
     *
     * @return void
     */
    public function index()
    {
        $data['data'] = $this->ProdutoModel->getListaProduto();
        $data["pages"] = $this->ProdutoModel->pager;

        return view('admin/listaProduto', $data);
    }


    /**
     * form
     *
     * @param mixed $action 
     * @param mixed $id 
     * @return void
     */
    public function form($action = null, $id = null)
    {
        $this->dados['action'] = $action;
        $this->dados['data']   = null;
        $this->dados['aAnexo'] = [];

        $DepartamentoModel  = new DepartamentoModel();

        $this->dados['aDepartamento']   = $DepartamentoModel->where("statusRegistro", 1)->orderBy('descricao')->findAll();

        if ($action != 'new') {

            $this->dados['data']    = $this->ProdutoModel->find($id);
            $this->dados['aAnexo']  = $this->ProdutoImagemModel->where('produto_id', $id)->orderBy('nomeArquivo')->findAll();

           // dd( $ProdutoImagemModel);

            if (empty($this->dados['data'])) {
                throw new \CodeIgniter\Database\Exceptions\DatabaseException("Registro não localização na base de dados (" . $id .  ")");
            }
        } else {
            $this->dados['data'] = [
                "statusRegistro" => 1
            ];
        }

        return view("admin/formProduto", $this->dados);
    }

    /**
     * store
     *
     * @return void
     */
    public function store()
    {
        $post       = $this->request->getPost();
        $aImagens   = $this->request->getFiles();
        $aAnexo     = [];

        $DepartamentoModel = new DepartamentoModel();

		// Válida extensão do(s) arquivo(s)		

		foreach($aImagens['imagem'] as $arq) {

			if (!empty($arq->getClientName())) {

				if (($arq->isValid()) && !($arq->hasMoved())) {

					$extArquivo = $arq->guessExtension();

					if (array_search($extArquivo, array('bmp', 'png', 'jpg', 'jpeg', 'gif', 'webp')) === false) {

						session()->setFlashData("msgError", "Extensão de arquivo não permitida ({$extArquivo}).");

                        if ($post['action'] != 'new') {
                            $aAnexo = $this->ProdutoImagemModel->where('produto_id', $post['id'])->orderBy('nomeArquivo')->findAll();
                        }

                        return view("admin/formProduto" , [
                            'action'        => $post['action'],
                            'data'          => $post,
                            'aDepartamento' => $DepartamentoModel->where("statusRegistro", 1)->orderBy('descricao')->findAll(),
                            'aAnexo'        => $aAnexo,
                            'errors'        => []
                        ]);
					}

				} else {
					throw new \RuntimeException($arq->getErrorString().'('.$arq->getError().')');
				}
			
			}

		}

        if ($this->ProdutoModel->save([
            'id'                => $post['id'],
            'descricao'         => $post['descricao'],
            "detalhamento"      => $post['detalhamento'],
            "departamento_id"   => $post['departamento_id'],
            "precoVenda"        => strToNumer($post['precoVenda']),
            'statusRegistro'    => $post['statusRegistro'],
            "largura"           => $post['largura'],
            "altura"            => $post['altura'],
            "profundidade"      => $post['profundidade'],
            "pesoBruto"         => strToNumer($post['pesoBruto'])
        ])) {

            if ($post['action'] == "new") {
                $produto_id = $this->ProdutoModel->getInsertID();       // pega o ID do produto inserido
            } else {
                $produto_id = $post['id'];
            }

			//
			// Realiza Download de arquivos
			//

            foreach($aImagens['imagem'] as $arq) {

                if (!empty($arq->getClientName())) {

					$ProdutoImagemModel = new ProdutoImagemModel();

                    $nomeFinal  = $arq->getRandomName();

					$arq->move(ROOTPATH .'public/uploads/produto/', $nomeFinal);

					$ProdutoImagemModel->insertImagem([ 
						'NomeArquivo'   => $nomeFinal , 
						'produto_id'    => $produto_id
                    ]);

				}

			}

            return redirect()->to("/Produto")->with('msgSucess', 'Dados atualizados com sucesso.');

        } else {

            if ($post['action'] != 'new') {
                $aAnexo = $this->ProdutoImagemModel->where('produto_id', $post['id'])->orderBy('nomeArquivo')->findAll();
            }

            return view("admin/formProduto" , [
                'action'        => $post['action'],
                'data'          => $post,
                'aDepartamento' => $DepartamentoModel->where("statusRegistro", 1)->orderBy('descricao')->findAll(),
                'aAnexo'        => $aAnexo,
                'errors'        => $this->ProdutoModel->errors()
            ]);

        }
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        if ($this->ProdutoModel->deleteProduto($this->request->getPost('id'))) {
            return redirect()->to("/Produto")->with('msgSucess', "Dados excluídos com sucesso.");
        } else {
            return redirect()->to('/Produto')->with('msgError', 'Erro ao tentar excluír os dados.');
        }
    }

    /**
     * excluirImagem
     *
     * @param integer $id 
     * @param string $nomeAnexo 
     * @return void
     */
    public function excluirImagem($id, $action, $nomeAnexo)
    {
        $ProdutoImagemModel = new ProdutoImagemModel();

        if ($ProdutoImagemModel->deleteProdutoImagem($id, $nomeAnexo)) {
            return redirect()->to("/Produto/form/" . $action . "/" . $id)->with('msgSucess', "Dados excluídos com sucesso.");
        } else {
            return redirect()->to("/Produto/form/" . $action . "/" . $id)->with('msgError', 'Erro ao tentar excluír os dados.');
        }
    }
}