<?php

class Livro {
    private int $idLivro;
    private string $titulo;
    private string $link_capa;
    
    public function __construct(string $titulo, string $link_capa) {
        $this->titulo = $titulo;
        $this->link_capa = $link_capa;
    }

    public static function findall() : array {
        $conexao = new MySQL();

        // Seleciona todos os livros que não pertencem a lista de favoritos do usuário
        $sql = "SELECT * FROM livros l WHERE l.idLivro NOT IN (SELECT lf.idLivro FROM livros_favoritos lf JOIN usuario u ON u.idUsuario = lf.idUsuario WHERE u.idUsuario = {$_SESSION["idUsuario"]});";

        $resultados = $conexao->consulta($sql);

        $livros = array();

        foreach($resultados as $resultado) {
            $livro = new Livro($resultado['Titulo'], $resultado['Link_Capa']);

            $livro->setIdLivro($resultado['idLivro']);

            $livros[] = $livro;
        }
        
        return $livros;
    }

    public static function find(int $id) : Livro {
        $conexao = new MySQL();

        $sql = "SELECT * FROM livros WHERE idLivro = {$id}";

        $resultado = $conexao->consulta($sql);

        $livro = new Livro($resultado[0]['Titulo'], $resultado[0]['Link_Capa']);
        $livro->setIdLivro($resultado[0]['idLivro']);

        return $livro;
    }

    public function savefavoritos() {
        $conexao = new MySQL();

        $sql = "INSERT INTO livros_favoritos (idlivro,idusuario) VALUES ('{$this->idLivro}','{$_SESSION['idUsuario']}')";
        
        return $conexao->executa($sql);
    }

    public static function getLivrosFavoritos() {
        $conexao = new MySQL();

        $sql = "SELECT l.* FROM livros_favoritos lf JOIN livros l ON l.idLivro = lf.idLivro WHERE lf.idUsuario = '{$_SESSION["idUsuario"]}'";

        $resultados = $conexao->consulta($sql);
        $livros = array();

        foreach($resultados as $resultado) {
            $livro = new Livro($resultado['Titulo'], $resultado['Link_Capa']);

            $livro->setIdLivro($resultado['idLivro']);

            $livros[] = $livro;
        }
        
        return $livros;
    }

    public function removeLivro() {
        $conexao = new MySQL();

        $sql = "DELETE FROM livros_favoritos WHERE idUsuario = {$_SESSION["idUsuario"]} AND idLivro = {$this->idLivro}";

        $conexao->executa($sql);
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