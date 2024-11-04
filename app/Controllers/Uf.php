<?php

namespace App\Controllers;

use App\Models\UfModel;

class Uf extends BaseController
{
    /**
     * construct
     */
    public function __construct()
    {
        $this->model = new UfModel();

        helper("uf");
    }

    /**
     * index (lista)
     *
     * @return void
     */
    public function index()
    {
        $this->dados['data'] = $this->model->getLista([], 'sigla');

        return view("admin/listaUf", $this->dados);
    }

    /**
     * form
     *
     * @param integer $id 
     * @param string $action 
     * @return void
     */
    public function form($action, $id = 0)
    {
        $this->dados['action'] = $action;

        if ($action != "new") {
            $this->dados['data'] = $this->model->getById($id);
        }

        return view("admin/formUf", $this->dados);
    }

    /**
     * store
     *
     * @return void
     */
    public function store()
    {
        $post = $this->request->getPost();

        if ($this->model->save([
            "id"    	=>  $post['id'],
            "sigla" 	=>  $post['sigla'],
            "descricao" =>  $post['descricao'],
            "regiao" 	=>  $post['regiao'],
            "codIBGE"   =>  $post['codIBGE']
        ])) {

            return redirect()->to('/Uf')->with('msgSucess', 'Dados Atualizado com Sucesso !');

        } else {

            return view('admin/formUf', [
                'action'	=> $post['action'],
                'data'		=> $post,
                'errors' => $this->model->errors()
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
        if ($this->model->delete($this->request->getPost('id')) ) {
			return redirect()->to('/Uf')->with('msgSucess', 'Dados Excluídos com Sucesso.');

		} else {
			return redirect()->to('/Uf')->with('msgError', 'Erro ao Tentar Exluir Dados.');
		}
    }
}