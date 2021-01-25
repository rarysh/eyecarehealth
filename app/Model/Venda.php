<?php

namespace App\Model;

use \App\Control\Database;
use \PDO;

class Venda{
    public $produtoId;
    public $vendedor;
    public $servicoId;
    public $quantidade;
    public $preco;
    public $data;

    public function getComissao(){
        if ($this->produtoId != null){
            return $this->quantidade * $this->preco / 10;
        }else {
            return $this->quantidade * $this->preco / 4;
        }
    }

    public function getTotal(){
        return $this->quantidade * $this->preco;
    }

    public function cadastrar(){

        $obDatabase = new Database('venda');

        $this->id = $obDatabase->insert([
            'produtoId'    => $this->produtoId,
            'vendedor' => $this->vendedor,
            'servicoId'     => $this->servicoId,
            'preco'     => $this->preco,
            'quantidade'     => $this->quantidade,
            'data'     => date("Y/m/d")
        ]);

        return true;
    }
    /**
     * @param  string $where
     * @param  string $order
     * @param  string $limit
     * @return array
     */
    public static function getVendas($vendedor){
        return (new Database('venda'))->select('vendedor = "'.$vendedor.'" and data > (NOW() - INTERVAL 1 MONTH)')
            ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

} ?>