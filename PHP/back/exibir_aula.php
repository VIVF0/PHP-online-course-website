<?php
class Aulas
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function exibirTodosAulas(string $id_curso): array
    {
        $resultado = $this->mysql->query("SELECT id_aula,id_curso, titulo_aula, descricao_aula FROM aulas  where id_curso=$id_curso");
        $aulas = $resultado->fetch_all(MYSQLI_ASSOC);
        return $aulas;
    }
    public function exibirAulas(): array
    {
        $resultado = $this->mysql->query("SELECT a.id_aula,a.id_curso, a.titulo_aula, a.descricao_aula, c.titulo FROM aulas a, cursos c where c.id_curso=a.id_curso");
        $aulas = $resultado->fetch_all(MYSQLI_ASSOC);
        return $aulas;
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
        $selecionaAula = $this->mysql->prepare("SELECT id_aula,id_curso, titulo_aula, descricao_aula, link_video FROM aulas where titulo_aula=?");
        $selecionaAula->bind_param('s', $titulo);  
        $selecionaAula->execute();
        $aula = $selecionaAula->get_result()->fetch_assoc();
        return $aula;
    }
}