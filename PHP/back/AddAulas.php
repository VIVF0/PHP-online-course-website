<?php

class addAulas
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function adicionar(string $titulo, string $descricao,string $titulo_curso,string $link_video): void
    {
        $valida = $this->mysql->prepare('SELECT titulo, id_curso from cursos where titulo=?');
        $valida->bind_param('s',$titulo_curso);
        $valida->execute();
        $curso= $valida->get_result()->fetch_assoc();
        $id_curso=$curso['id_curso'];
        if($id_curso!=null){
            $insereAula = $this->mysql->prepare('INSERT INTO aulas (titulo_aula, descricao_aula,link_video,id_curso) VALUES(?,?,?,?)');
            $insereAula->bind_param('ssss', $titulo, $descricao ,$link_video,$id_curso);
            $insereAula->execute();
        }
    }
    public function remover(string $id): void
    {   
        $removerAula = $this->mysql->prepare('DELETE FROM aulas WHERE id_aula = ?');
        $removerAula->bind_param('s', $id);
        $removerAula->execute();
    }
    public function removerAulas(string $id): void{
        $removerAula = $this->mysql->prepare('DELETE FROM aulas WHERE id_curso = ?');
        $removerAula->bind_param('s', $id);
        $removerAula->execute();
    }
    public function editar(string $id, string $titulo, string $descricao, string $video): void
    {
        $editaAula = $this->mysql->prepare('UPDATE aulas SET titulo_aula = ?, descricao_aula = ?, link_video=? WHERE id_aula = ?');
        $editaAula->bind_param('ssss', $titulo, $descricao,$video, $id);
        $editaAula->execute();
    }
}