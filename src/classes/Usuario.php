<?php

class Usuario {

    private int $idUsuario;
    private string $email;
    private string $senha;
    private string $nome;
    
    public function __construct(string $email, string $senha, string $nome) {
        $this->email = $email;
        $this->senha = $senha;
        $this->nome = $nome;
    }

    public function save():bool {
        $conexao = new MySQL();

        $this->senha = password_hash($this->senha, PASSWORD_BCRYPT); 

        if(isset($this->idUsuario)) {
            $sql = "UPDATE usuario SET Email = '{$this->email}' ,Senha = '{$this->senha}',Nome = '{$this->nome}' WHERE idUsuario = {$this->idUsuario}";
        } else {
            $sql = "INSERT INTO usuario (Email,Senha,Nome) VALUES ('{$this->email}','{$this->senha}','{$this->nome}')";
        }

        return $conexao->executa($sql);
    }

    public function authenticate():bool{
        $conexao = new MySQL();

        $sql = "SELECT idUsuario,senha FROM usuario WHERE Email = '{$this->email}'";

        $resultados = $conexao->consulta($sql);

        if(password_verify($this->senha, $resultados[0]['Senha'])) {
            session_start();

            $_SESSION['idUsuario'] = $resultados[0]['idUsuario'];
            $_SESSION['Email'] = $resultados[0]['Email'];

            return true;
        }

        return false;
    }

    // Getters e Setters

    public function setIdUsuario(int $idUsuario):void {
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario():int{
        return $this->idUsuario;
    }

    public function setSenha(string $senha):void{
        $this->senha = $senha;
    }

    public function getSenha():string{
        return $this->senha;
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function getEmail():string{
        return $this->email;
    }
}