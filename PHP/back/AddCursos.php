<?php

class addCursos
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function adicionar(string $titulo, string $descricao, string $custo,string $carga): void
    {
        $insereCurso = $this->mysql->prepare('INSERT INTO cursos (titulo, descricao,custo,carga_horario) VALUES(?,?,?,?);');
        $insereCurso->bind_param('ssss', $titulo, $descricao, $custo, $carga);
        $insereCurso->execute();
    }
    public function remover(string $id): void
    {
        $removerCurso = $this->mysql->prepare('DELETE FROM cursos  WHERE id_curso = ?');
        $removerCurso->bind_param('s', $id);
        $removerCurso->execute();
    }
    public function editar(string $id, string $titulo, string $descricao,string $custo,string $carga): void
    {
        $editaCurso = $this->mysql->prepare('UPDATE cursos SET titulo = ?, descricao = ?, custo = ?, carga_horario = ? WHERE id_curso = ?');
        $editaCurso->bind_param('sssss', $titulo, $descricao, $id, $custo, $carga);
        $editaCurso->execute();
    }
}