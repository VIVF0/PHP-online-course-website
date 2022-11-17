<?php

class addAvaliacao
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function adicionar(string $titulo, string $descricao,string $titulo_aula, string $titulo_curso): void
    {
        $valida = $this->mysql->prepare('SELECT id_curso from cursos where titulo=?');
        $valida->bind_param('s',$titulo_curso);
        $valida->execute();
        $curso= $valida->get_result()->fetch_assoc();
        $id_curso=$curso['id_curso'];
        $validaAula = $this->mysql->prepare('SELECT id_aula from aulas where titulo_aula=?');
        $validaAula->bind_param('s',$titulo_aula);
        $validaAula->execute();
        $aula= $validaAula->get_result()->fetch_assoc();
        $id_aula=$aula['id_aula'];
        if($id_curso!=null and $id_aula!=null){
            $insereavaliacao = $this->mysql->prepare('INSERT INTO avaliacoes (id_curso,titulo_avaliacao, descricao_avaliacao, id_aula) VALUES(?,?,?,?);');
            $insereavaliacao->bind_param('ssss',$id_curso, $titulo, $descricao,$id_aula);
            $insereavaliacao->execute();
        }
    }
    public function removerQuest(string $id) : void{
        $opcao = new addAvaliacao($this->mysql);
        $opcao->removerOp($id);
        $removerQuest= $this->mysql->prepare('DELETE FROM questoes  WHERE id_avaliacao = ?');
        $removerQuest->bind_param('s', $id);
        $removerQuest->execute();
    }
    public function removerOp(string $id): void{
        $result = mysqli_query($this->mysql,"SELECT * FROM questoes WHERE id_avaliacao = $id"); 
        $cont=mysqli_num_rows($result);
        if($cont!=0){
            for($i=0;$i<$cont;$i++){     
                $identi=mysqli_fetch_assoc($result);
                $removerOp = $this->mysql->prepare('DELETE FROM opcoes  WHERE id_questao = ?');
                $removerOp->bind_param('s', $identi['id_questao']);
                $removerOp->execute();
            }
        } 
    }
    public function remover(string $id): void
    {
        $removerAvaliacao = $this->mysql->prepare('DELETE FROM avaliacoes  WHERE id_avaliacao = ?');
        $removerAvaliacao->bind_param('s', $id);
        $removerAvaliacao->execute();
    }
    public function editar(string $id, string $titulo, string $descricao): void
    {
        $editaCurso = $this->mysql->prepare('UPDATE cursos SET titulo = ?, descricao = ? WHERE id_curso = ?');
        $editaCurso->bind_param('sss', $titulo, $descricao, $id);
        $editaCurso->execute();
    }
    public function addquestao(string $enunciado,string $titulo_avaliacao,string $resposta): void{
        $valida = $this->mysql->prepare('SELECT id_avaliacao from avaliacoes where titulo_avaliacao=?');
        $valida->bind_param('s',$titulo_avaliacao);
        $valida->execute();
        $avaliacao= $valida->get_result()->fetch_assoc();
        $id_avaliacao=$avaliacao['id_avaliacao'];
        if($id_avaliacao!=null){
            $inserequestao=$this->mysql->prepare('INSERT INTO questoes (id_avaliacao, enunciado, resposta) VALUES(?,?,?);');
            $inserequestao->bind_param('sss',$id_avaliacao, $enunciado, $resposta);
            $inserequestao->execute();
        }
    }
    public function addopcao(string $opcao,string $justificativa,string $enunciado,string $n): void{
        $valida = $this->mysql->prepare('SELECT id_questao from questoes where enunciado=?');
        $valida->bind_param('s',$enunciado);
        $valida->execute();
        $avaliacao= $valida->get_result()->fetch_assoc();
        $id_questao=$avaliacao['id_questao'];
        if($id_questao!=null){
            $inserequestao=$this->mysql->prepare('INSERT INTO opcoes (id_questao, opcao, justificativa,n_op) VALUES(?,?,?,?);');
            $inserequestao->bind_param('ssss',$id_questao, $opcao, $justificativa,$n);
            $inserequestao->execute();
        }
    }
}