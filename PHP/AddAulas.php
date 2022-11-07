<?php

class addAulas
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function adicionar(string $titulo, string $descricao,string $ID_Curso,string $link_video): void
    {
        $insereAula = $this->mysql->prepare('INSERT INTO aulas (id_aula,titulo_aula, descricao_aula,link_video,id_curso) VALUES(?,?,?,?);');
        $insereAula->bind_param('ssss', $titulo, $descricao,$ID_Curso,$link_video);
        $insereAula->execute();
    }
    public function remover(string $id): void
    {
        $removerAula = $this->mysql->prepare('DELETE FROM aulas WHERE id_aula = ?');
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