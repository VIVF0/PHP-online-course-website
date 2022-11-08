<?php
class Avaliacoes
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function exibirTodosAvaliacoes(string $id_curso): array
    {
        $resultado = $this->mysql->query("SELECT * FROM aulas  where id_curso=$id_curso");
        $avaliacoes = $resultado->fetch_all(MYSQLI_ASSOC);
        return $avaliacoes;
    }
    public function exibirAvaliacoes(): array
    {
        $resultado = $this->mysql->query("SELECT a.id_avaliacao,a.id_curso, a.titulo_avaliacao, a.descricao_avaliacao, a.dps_n_aula , c.titulo FROM avaliacoes a, cursos c where c.id_curso=a.id_curso");
        $avaliacao = $resultado->fetch_all(MYSQLI_ASSOC);
        return $avaliacao;
    }
    public function encontrarPorId(string $id): array
    {
        $selecionaAvaliacao = $this->mysql->prepare("SELECT * FROM avaliacoes WHERE id_avaliacao = ?");
        $selecionaAvaliacao->bind_param('s', $id);
        $selecionaAvaliacao->execute();
        $avaliacao = $selecionaAvaliacao->get_result()->fetch_assoc();
        return $avaliacao;
    }
}