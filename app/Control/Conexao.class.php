<?php

class Conexao {
    private $usuario = 'root'; //usuario banco de dados
    private $senha = 'admin'; //senha banco de dados
    private $caminho = '127.0.0.1'; //servidor banco de dados
    private $banco = 'eyecare';  //nome do banco de dados
    private $con;

    public function __construct() {
        $this->con = mysqli_connect($this->caminho, $this->usuario, $this->senha) or die("Conexão com o banco de dados falhou!" . mysqli_error($this->con));

        mysqli_select_db($this->con, $this->banco) or die("Conexão com o banco de dados falhou!" . mysqli_error($this->con));

    }

    public function getCon() {
        return $this->con;
    }
}
