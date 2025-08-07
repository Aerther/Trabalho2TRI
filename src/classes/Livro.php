<?php

class Livro {
    private int $idLivro;
    private string $titulo;
    private string $link_capa;
    
    public function __construct(string $titulo, string $link_capa) {
        $this->titulo = $titulo;
        $this->link_capa = $link_capa;
    }

    public static function findall():array{
        $conexao = new MySQL();

        $sql = "SELECT * FROM livros";

        $resultados = $conexao->consulta($sql);
        $pessoas = array();

        foreach($resultados as $resultado) {
            $p = new Livro($resultado['Titulo'], $resultado['Link_Capa']);

            $p->setIdLivro($resultado['idLivro']);

            $pessoas[] = $p;
        }
        
        return $pessoas;
    }

    // Getters e Setters

    public function setIdLivro(int $idUsuario):void {
        $this->idUsuario = $idUsuario;
    }

    public function getIdLivro():int{
        return $this->idUsuario;
    }

    public function setLinkCapa(string $senha):void{
        $this->senha = $senha;
    }

    public function getLinkCapa():string{
        return $this->senha;
    }

    public function setTitulo(string $email):void{
        $this->email = $email;
    }

    public function getTitulo():string{
        return $this->email;
    }
}

?>