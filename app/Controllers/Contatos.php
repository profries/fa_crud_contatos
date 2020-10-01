<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ContatosModel;

class Contatos extends Controller
{
	public function lista()
	{
		$model = new ContatosModel();
		$data['contatos'] = $model->listar();
		$data['cabecalho']=array('NOME','TELEFONE','EMAIL');
		return view('tabela',$data);
	}
	public function novo()
	{
		return view('form');
	}

	public function inserir()
	{
		$model = new ContatosModel();
			/*if ($this->request->getMethod() === 'post' && $this->validate([
            'nome' => 'required|min_length[3]|max_length[30]',
            'telefone' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[3]|max_length[30]',
        ]))
    	{*/
			$model->save([
				'nome' => $this->request->getPost('nome'),
				'telefone' => $this->request->getPost('telefone'),
				'email'  => $this->request->getPost('email')
			]);

			echo "Contato adicionado com sucesso!";
			return view('form');

		/*}
		else
		{
			return view('form');
		}*/
	}

	//--------------------------------------------------------------------

}
