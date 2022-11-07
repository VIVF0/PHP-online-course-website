<?php

class Cursos
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function exibirTodos(): array
    {
        $resultado = $this->mysql->query("SELECT id_curso, titulo, descricao FROM cursos");
        $cursos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $cursos;
    }

    public function encontrarPorId(string $id): array
    {
        $selecionaCurso = $this->mysql->prepare("SELECT id_curso, titulo, descricao FROM cursos WHERE id_curso = ?");
        $selecionaCurso->bind_param('s', $id);
        $selecionaCurso->execute();
        $curso = $selecionaCurso->get_result()->fetch_assoc();
        return $curso;
    }
    public function encontrarPorTitulo(string $titulo): array
    {
        $var="%$titulo%";
        /*$resultado = $this->mysql->query("SELECT id_curso, titulo, descricao FROM cursos WHERE titulo like "."$var".";");
        $cursos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $cursos;*/
        $selecionaCurso = $this->mysql->prepare("SELECT id_curso, titulo, descricao FROM cursos WHERE titulo like ?;");
        $selecionaCurso->bind_param('s', $var);
        $selecionaCurso->execute();
        $curso[] = $selecionaCurso->get_result()->fetch_assoc();
        return $curso;
    }
}