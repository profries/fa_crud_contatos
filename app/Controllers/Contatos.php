<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ContatosModel;

class Contatos extends Controller
{

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
	}

	public function index()
	{
		return $this->listar();
	
	}
	public function listar()
	{
		//Recupera a mensagem e exclui a sessão
		$data['mensagem'] = $this->session->getFlashData('mensagem');

		$model = new ContatosModel();
		$data['contatos'] = $model->listar();
		$data['cabecalho']=array('NOME','TELEFONE','EMAIL');
		return view('tabela',$data);
	}

	public function inserir()
	{
		$data['mensagem'] = '';
		if($this->request->getMethod() == 'post'){
			$model = new ContatosModel();
			$model->set('nome',$this->request->getPost('nome'));
			$model->set('telefone',$this->request->getPost('telefone'));
			$model->set('email',$this->request->getPost('email'));
			if($model->insert())
				$data['mensagem'] = 'Contato inserido com sucesso!';	
			else
				$data['mensagem'] = 'Erro ao cadastrar contato';
		}
		return view('form',$data);

	}

	public function editar($id){
		$data['mensagem'] = '';

		$model = new ContatosModel();
		$contato = $model->buscarPorId($id);

		if($this->request->getMethod() == 'post'){
			$contato['nome'] = $this->request->getPost('nome');
			$contato['telefone'] = $this->request->getPost('telefone');
			$contato['email'] = $this->request->getPost('email');
			
			if($model->update($id,$contato))
				$data['mensagem'] = 'Contato editado com sucesso!';	
			else
				$data['mensagem'] = 'Erro ao editar contato';	
		}
		
		$data['contato'] = $contato;
		
		return view('edit',$data);
	}

	public function excluir($id) {
		$model = new ContatosModel();
		$mensagem = '';
		if($model->delete($id)){
			$mensagem = 'Contato removido com sucesso!';
		}
		else{
			$mensagem = 'Erro ao remover contato!'; 
		}

		//Cria variável temporária da sessão - dura até a chamada do get
		$this->session->setFlashData('mensagem',$mensagem);
		//Redireciona para /contatos/listar
		return redirect()->to(base_url('contatos/listar'));

	}
}
