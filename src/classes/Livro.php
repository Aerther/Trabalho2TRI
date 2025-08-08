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

    public function setIdLivro(int $idLivro):void {
        $this->idLivro = $idLivro;
    }

    public function getIdLivro():int{
        return $this->idLivro;
    }

    public function setLinkCapa(string $link_capa):void{
        $this->link_capa = $link_capa;
    }

    public function getLinkCapa():string{
        return $this->link_capa;
    }

    public function setTitulo(string $titulo):void{
        $this->titulo = $titulo;
    }

    public function getTitulo():string{
        return $this->titulo;
    }
}

?>