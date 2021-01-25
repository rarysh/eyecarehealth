<?php

namespace App\Model;

use \App\Control\Database;
use \PDO;

class ProdutoServico{
    public $nome;
    public $preco;
    public $quantidade;

    public function cadastrar(){

        $obDatabase = new Database('produto');
        $this->id = $obDatabase->insert([
            'nome'    => $this->nome,
            'preco' => $this->preco,
            'quantidade'     => $this->quantidade,
            'tipo'     => $this->tipo
        ]);

        return true;
    }

    /**
     * Método responsável por atualizar o produto no banco
     * @return boolean
     */
    public function atualizar(){
        return (new Database('produto'))->update('id = '.$this->id,[
            'nome'    => $this->nome,
            'preco' => $this->preco,
            'quantidade'     => $this->quantidade
        ]);
    }

    /**
     * Método responsável por obter os produtos do banco de dados
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @return array
     */
    public static function getProdutos($where = null, $order = null, $limit = null){
        return (new Database('produto'))->select($where,$order,$limit)
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * Método responsável por buscar um produto com base em seu ID
     * @param  integer $id
     * @return Produto
     */
    public static function getProduto($id){
        return (new Database('produto'))->select('id = '.$id)
            ->fetchObject(self::class);
    }
} ?>