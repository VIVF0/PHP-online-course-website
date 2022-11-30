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
        $resultado = $this->mysql->query("SELECT * FROM cursos");
        $cursos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $cursos;
    }

    public function encontrarPorId(string $id): array
    {
        $selecionaCurso = $this->mysql->prepare("SELECT * FROM cursos WHERE id_curso = ?");
        $selecionaCurso->bind_param('s', $id);
        $selecionaCurso->execute();
        $curso = $selecionaCurso->get_result()->fetch_assoc();
        return $curso;
    }
    public function encontrarPorTitulo(string $titulo)
    {
        $result = mysqli_query($this->mysql,"SELECT * FROM cursos WHERE titulo like '".$titulo."%'"); 
        $cont=mysqli_num_rows($result);
        if($cont!=0){
            for($i=0;$i<$cont;$i++){     
                $cursos[$i]=mysqli_fetch_assoc($result);
            }
            return $cursos;
        }        
    }
    public function cursoAssinados(): array
    {
        $selecionaCurso = $this->mysql->query("SELECT id_curso, count(id_cliente) as 'assinantes' FROM assinatura GROUP BY id_curso");
        $cursos = $selecionaCurso->fetch_all(MYSQLI_ASSOC);
        return $cursos;
    }
    public function insertAssinatura(string $id_cliente,string $id_curso): void
    {
        $msg="IMCOMPLETO";
        $insereCurso = $this->mysql->prepare('INSERT INTO assinatura (id_curso, id_cliente, status_curso) VALUES(?,?,?);');
        $insereCurso->bind_param('sss', $id_curso,$id_cliente,$msg );
        $insereCurso->execute();
    }
    public function cursofalta(string $id_cliente)
    {
        $verifica=$this->mysql->query("SELECT * from assinatura where id_cliente=$id_cliente;");
        $ver=mysqli_num_rows($verifica);
        if($ver!=0){
            $selecionaCurso = $this->mysql->query("SELECT c.titulo from assinatura a INNER JOIN cursos c ON a.id_curso!=c.id_curso and a.id_cliente=$id_cliente;");
            $cont=mysqli_num_rows($selecionaCurso);
            if($cont!=0){
                for($i=0;$i<$cont;$i++){
                    $cursos[$i]=mysqli_fetch_assoc($selecionaCurso);
                    if(!is_null($cursos[$i])){
                        $curso[$i]=$cursos[$i];
                    }
                }
                return $curso;
            }
        }else{
            $selecionaCurso = $this->mysql->query("SELECT * from cursos");
            $cont=mysqli_num_rows($selecionaCurso);
            if($cont!=0){
                for($i=0;$i<$cont;$i++){
                    $cursos[$i]=mysqli_fetch_assoc($selecionaCurso);
                    if(!is_null($cursos[$i])){
                        $curso[$i]['titulo']=$cursos[$i]['titulo'];
                    }
                }
                return $curso;
            }
        }
    }
}