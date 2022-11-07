<?php
class Aulas
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function exibirTodos(string $id_aula): array
    {
        $resultado = $this->mysql->query("SELECT id_aula,id_curso, titulo_aula, descricao_aula FROM aulas  where id_curso=$id_aula");
        $aulas = $resultado->fetch_all(MYSQLI_ASSOC);
        return $aulas;
        /*$selecionaAula = $this->mysql->prepare("SELECT id_aula,id_curso, titulo_aula, descricao_aula FROM aulas where id_curso=?");
        $selecionaAula->bind_param('s', $id_curso);
        $selecionaAula->execute();
        $aulas = $selecionaAula->get_result()->fetch_assoc();
        return $aulas;*/
    }

    public function encontrarPorId(string $id): array
    {
        $selecionaAula = $this->mysql->prepare("SELECT id_aula,id_curso, titulo_aula, descricao_aula, link_video FROM aulas WHERE id_aula = ?");
        $selecionaAula->bind_param('s', $id);
        $selecionaAula->execute();
        $aula = $selecionaAula->get_result()->fetch_assoc();
        return $aula;
    }
    public function encontrarPorTitulo(string $titulo): array
    {
        $selecionaAula = $this->mysql->prepare("SELECT id_aula,id_curso, titulo_aula, descricao_aula, link_video FROM aulas where titulo=?");
        $selecionaAula->bind_param('s', $titulo);  
        $selecionaAula->execute();
        $aula = $selecionaAula->get_result()->fetch_assoc();
        return $aula;
    }
}