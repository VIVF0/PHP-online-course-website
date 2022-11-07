<?php

class addCursos
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function adicionar(string $titulo, string $descricao): void
    {
        $insereCurso = $this->mysql->prepare('INSERT INTO cursos (titulo, descricao) VALUES(?,?);');
        $insereCurso->bind_param('ss', $titulo, $descricao);
        $insereCurso->execute();
    }
    public function remover(string $id): void
    {
        $removeraula = $this->mysql->prepare('DELETE FROM aulas  WHERE id_curso = ?');
        $removeraula->bind_param('s', $id);
        $removeraula->execute();
        $removerCurso = $this->mysql->prepare('DELETE FROM cursos  WHERE id_curso = ?');
        $removerCurso->bind_param('s', $id);
        $removerCurso->execute();
    }
    public function editar(string $id, string $titulo, string $descricao): void
    {
        $editaCurso = $this->mysql->prepare('UPDATE cursos SET titulo = ?, descricao = ? WHERE id_curso = ?');
        $editaCurso->bind_param('sss', $titulo, $descricao, $id);
        $editaCurso->execute();
    }
}