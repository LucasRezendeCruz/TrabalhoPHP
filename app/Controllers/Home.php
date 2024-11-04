<?php

namespace App\Controllers;

use App\Models\DepartamentoModel;
use App\Models\ProdutoImagemModel;
use App\Models\ProdutoModel;
use App\Models\UsuarioModel;

class Home extends BaseController
{
	/**
	 * index
	 *
	 * @return void
	 */
	public function index()
	{
		$ProdutoModel = new ProdutoModel();
		
		if (is_null(session()->get('aMenuDepartamento'))) {

			$DepartamentoModel = new DepartamentoModel();
			$DepartamentoModel->getMenuDepartamento();
		}
		
		return view('home', $ProdutoModel->getListaHome());
	}

	/**
	 * Carrega a view Sobre nós
	 *
	 * @return void
	 */
	public function sobrenos()
	{
		return view("sobrenos");
	}

	/**
	 * Carrega a view Contato
	 *
	 * @return void
	 */
	public function contato()
	{
		return view("contato", $this->dados);
	}

	/**
	 * Carrega a view Contato
	 *
	 * @return void
	 */
	public function contatoEnviaEmail()
	{
		$email = \Config\Services::email();
		$email->initialize(CONFIG_EMAIL);

		$post = $this->request->getPost();

		//
		$email->setFrom($post['email'], $post['nome']);				// Quem está enviando o e-mail
		$email->setTo("lucasrezecruz@gmail.com");					// Define o (s) endereço (s) de e-mail do (s) destinatário (s).
//		$email->setCC('another@another-example.com');				// Define o (s) endereço (s) de e-mail CC (cópia)

		$email->setSubject($post['assunto']);						// Define o assunto do e-mail.
		$email->setMessage($post['mensagem']);						// Define o corpo da mensagem de e-mail:
		
		if ($email->send()) {
			return redirect()->to("/contato")->with("msgSucess", "E-mail enviado com sucesso, aguarde em breve entraremos em contato.");
		} else {
			return redirect()->back()->with("msgError", $email->printDebugger('header'))->withInput();
		}
	}

	/**
	 * Carrega a view Login
	 *
	 * @return void
	 */
	public function login()
	{
		return view("login");
	}

	/**
	 * Carrega a view Criar nova Conta
	 *
	 * @return void
	 */
	public function criarNovaConta()
	{
		$this->dados['data'] = [];
		return view("criarNovaConta", $this->dados);
	}

	/**
	 * gravarNovaConta
	 *
	 * @return void
	 */
	public function gravarNovaConta()
	{
		$UsuarioModel = new UsuarioModel();

		$post = $this->request->getPost();
		
		// verificar se usuário já tem conta
		$temUsuario = $UsuarioModel->where("email", $post['email'])->first();

		if (is_null($temUsuario)) {

			if (trim($post['senha']) == trim($post['confirmaSenha'])) {

				$created_at = date("Y-m-d H:i:s");
	
				$aPessoa = [
					"nome"		        => $post['nome'],
					"ddd1"		        => $post['ddd1'],
					"celular1"		    => $post['celular1'],
					"statusRegistro"	=> 1,
					"created_at"		=> $created_at,
					"updated_at"		=> $created_at
				]; 
		
				$aEndereco = [
					"tipoEndereco"      => 1,
					"created_at"		=> $created_at,
					"updated_at"		=> $created_at
				];
				
				$aUsuario = [
					"nome"				=> $post['nome'],
					"nivel"				=> 11,                   // 11 = Cliente
					"statusRegistro"	=> 0,
					"email"				=> $post['email'],
					"senha"				=> password_hash(trim($post['senha']), PASSWORD_DEFAULT),
					"pessoa_id"		    => null,
					"created_at"		=> $created_at,
					"updated_at"		=> $created_at
				];
		
				if ($UsuarioModel->insertUsuario($aPessoa, $aEndereco, $aUsuario) > 0) {
					$this->sendActivationEmail($aUsuario['email'], $aUsuario['nome']);
					
					return redirect("criarNovaConta")->with("msgSucess", "Conta Criada com sucesso");
				} else {
	
					session()->set("msgError", $UsuarioModel->errors());
	
					return view('criarNovaConta', [
						'data'		=> $post,
						'errors' 	=> $UsuarioModel->errors()
					]);
				}
	
			} else {
				session()->setFlashdata("msgError", "Senhas não conferem.");
			} 
			
		} else {
			session()->setFlashdata("msgError", "Usuário já existe na plataforma.");
		}

		return view('criarNovaConta', [
				'data'		=> $post,
				'errors' 	=> []
			]);

	}

	private function sendActivationEmail($email, $name)
    {
        $emailService = \Config\Services::email();

        $emailService->setFrom('2f98553c78b9b9', 'InovaTech');
        $emailService->setTo($email);
        $emailService->setSubject('Ativação de Conta');
        
        // Crie um link de ativação aqui
        $activationLink = base_url("ativarConta?token=" . base64_encode($email)); // Exemplo de token simples

        $message = "Olá " . $name . ",<br>Para ativar sua conta, clique no link abaixo:<br><a href='" . $activationLink . "'>Ativar Conta</a>";

        $emailService->setMessage($message);
        $emailService->setMailType('html');

        // Enviar o e-mail
        return $emailService->send();
    }

	public function ativarConta()
	{
    $token = $this->request->getGet('token');
    $email = base64_decode($token);

    $UsuarioModel = new UsuarioModel();
    $usuario = $UsuarioModel->getByEmail($email);

    if ($usuario) {
        // Ativar a conta
        $UsuarioModel->update($usuario['id'], ['statusRegistro' => 1]);

        return redirect()->to('/login')->with('msgSucess', 'Conta ativada com sucesso! Você já pode fazer login.');
    } else {
        return redirect()->to('/login')->with('msgError', 'Token de ativação inválido ou expirado.');
    }
	}


	/**
	 * 	Carrega a view carrinho de compras
	 *
	 * @return void
	 */
	public function carrinhoCompras()
	{
		return view('carrinho-compras');
	}

	/**
	 * Carrega a view carrinho pagamento
	 *
	 * @return void
	 */
	public function carrinhoPagamento()
	{
		return view('carrinho-pagamento');
	}

	/**
	 * 	Carrega a view confirmação do carrinho de compras
	 *
	 * @return void
	 */
	public function carrinhoConfirmacao()
	{
		return view('carrinho-confirmacao');
	}

	/**
	 * produtoDetalhe
	 *
	 * @param mixed $id 
	 * @return void
	 */
	public function produtoDetalhe($id)
	{
		$ProdutoModel = new ProdutoModel();
		$ProdutoImagemModel = new ProdutoImagemModel();

		$produto = $ProdutoModel->find($id);
		$produto['imagem'] = $ProdutoImagemModel->where("produto_id", $id)->findAll();
		
		return view('produto-detalhe', $produto);
	}
}