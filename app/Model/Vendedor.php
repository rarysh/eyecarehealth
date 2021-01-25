<?php

namespace App\Model;

include('../Control/Conexao.class.php');

use App\Control\Database;

class Vendedor{
    public $nome;
    public $usuario;
    public $senha;
    public $dataInicio;

    public function __construct() {
        $this->conexao = new \Conexao();
    }

    // efetua login
    public function login($login, $senha) {

        $sql = "SELECT * FROM vendedor WHERE usuario = '$login' AND senha = '$senha'";

        $executa = mysqli_query($this->conexao->getCon(), $sql);

        if(mysqli_num_rows($executa) > 0) {
            return true;
        } else {
            return false;
        }
    }


    // Verifica se já existe login com o nome escolhido
    public function unico($login) {

        $unic = "SELECT * FROM vendedor WHERE usuario = '$login'";

        $exec = mysqli_query($this->conexao->getCon(), $unic);

        if(mysqli_num_rows($exec) > 0) {
            return false;
        } else {
            return true;
        }
    }

    // cadastra o usuário
    public function cadastra($login,$senha, $nome) {

        $sql = "INSERT INTO vendedor (usuario,senha, nome, dataInicio) VALUES ('$login','$senha', '$nome', NOW())";

        $executa = mysqli_query($this->conexao->getCon(), $sql);

        if(mysqli_affected_rows($this->conexao->getCon()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // efetua logout
    public function logout() {

        session_start();

        session_destroy();

        //setcookie("login" , "" , time()-60*5);
        header("Location:index.php?success=logout");
        exit();
    }
    public static function getVendedor($usuario){
        return (new Database('vendedor'))->select('usuario = "'.$usuario.'"')
            ->fetchObject(self::class);
    }
    public function getBonus($data, $size){
        if ($size >= 5){
        $date = strtotime($data);
        $now = strtotime(date('Y\m\d'));

        $diff = abs($now - $date);
        if (floor($diff / (365*60*60*24)) > 10)
            return 10/100;
        else if (floor($diff / (365*60*60*24)) > 5)
            return 6/100;
        else
            return 3/100;
        }
        else
            return 0;
    }

} ?>