<?php namespace App\Models;

use CodeIgniter\Model;

class ContatosModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'contatos';
    protected $allowedFields = ['nome','telefone','email'];

    public function listar(){
        return $this->findAll();
    }
}