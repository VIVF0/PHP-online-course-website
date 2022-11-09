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
        $resultado = $this->mysql->query("SELECT * FROM avaliacoes where id_curso='$id_curso'");
        $avaliacoes = $resultado->fetch_all(MYSQLI_ASSOC);
        return $avaliacoes;
    }
    public function exibirAvaliacoes(): array
    {
        $resultado = $this->mysql->query("SELECT a.id_avaliacao,a.id_curso, a.titulo_avaliacao, a.descricao_avaliacao, a.id_aula , c.titulo, al.titulo_aula FROM avaliacoes a, cursos c, aulas al where c.id_curso=a.id_curso and al.id_aula=a.id_aula");
        $avaliacao = $resultado->fetch_all(MYSQLI_ASSOC);
        return $avaliacao;
    }
    public function encontrarPorId(string $id): array
    {
        $selecionaAvaliacao = $this->mysql->prepare("SELECT a.id_avaliacao,a.id_curso, a.titulo_avaliacao, a.descricao_avaliacao, a.id_aula , c.titulo, al.titulo_aula FROM avaliacoes a, cursos c, aulas al where id_avaliacao = ?");
        $selecionaAvaliacao->bind_param('s', $id);
        $selecionaAvaliacao->execute();
        $avaliacao = $selecionaAvaliacao->get_result()->fetch_assoc();
        return $avaliacao;
    }
    public function exibirQuestao(string $id){
        $result = mysqli_query($this->mysql,"SELECT * FROM questoes WHERE id_avaliacao=$id"); 
        $cont=mysqli_num_rows($result);
        if($cont!=0){
            for($i=0;$i<$cont;$i++){     
                $questoes[$i]=mysqli_fetch_assoc($result);
            }
        }else{
            $questoes=null;
        }
        return $questoes;
    }
    public function exibirOp(string $id){
        $result = mysqli_query($this->mysql,"SELECT * FROM opcoes WHERE id_questao=$id"); 
        $cont=mysqli_num_rows($result);
        if($cont!=0){
            for($i=0;$i<$cont;$i++){     
                $opcao[$i]=mysqli_fetch_assoc($result);
            }
        }else{
            $opcao[]=[
                'titulo'=>'Não Encontrado!',
                'descricao'=> 'O Curso não foi encontrado',
                'id_curso'=> '0',
            ];
        }
        return $opcao;
    }
}