<?php

class Perfil
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function exibirPerfil(string $login): array
    {
        $selecionaPerfil = $this->mysql->prepare("SELECT * FROM conta WHERE usuario = ?");
        $selecionaPerfil->bind_param('s', $login);
        $selecionaPerfil->execute();
        $perfil = $selecionaPerfil->get_result()->fetch_assoc();
        return $perfil;
    }
    public function exibirHistorico(string $id)
    {
        $result = mysqli_query($this->mysql,"SELECT * FROM historico WHERE id_cliente = $id"); 
        $cont=mysqli_num_rows($result);
        if($cont!=0){
            for($i=0;$i<$cont;$i++){
                $historico[$i]=mysqli_fetch_assoc($result);
            }
            return $historico;
        }
    }
    public function verificarHistorico(string $login,string $id_avaliacao): bool
    {
        $verifica= new Perfil($this->mysql);
        $id=$verifica->exibirPerfil($login);
        $selecionaHistorico = $this->mysql->prepare("SELECT * FROM historico WHERE id_cliente = ? and id_avaliacao=?");
        $selecionaHistorico->bind_param('ss', $id['id_cliente'],$id_avaliacao);
        $selecionaHistorico->execute();
        $historico = $selecionaHistorico->get_result()->fetch_assoc();
        if(isset($historico)){
            return 1;
        }else{
            return 0;
        }
    }
    public function valiAssinatura(string $login,string $curso):void{
        $verifica= new Perfil($this->mysql);
        $id=$verifica->exibirPerfil($login);
        $valida = $this->mysql->prepare('SELECT * FROM assinatura where id_cliente=? and id_curso=?');
        $valida->bind_param('ss',$id['id_cliente'],$curso);
        $valida->execute();
        $assinante= $valida->get_result()->fetch_assoc();
        if(!isset($assinante)){
            echo"<script language='javascript' type='text/javascript'>
            alert('É necessario assinar o curso para poder acessar este conteúdo!');window.location
            .href='formulario de pagamento.php';</script>";
        }
    }
    public function exibirAssinatura(string $login){
        $verifica= new Perfil($this->mysql);
        $id=$verifica->exibirPerfil($login);
        $result = mysqli_query($this->mysql,"SELECT * FROM assinatura where id_cliente=".$id['id_cliente']); 
        $cont=mysqli_num_rows($result);
        if($cont!=0){
            for($i=0;$i<$cont;$i++){
                $assinatura[$i]=mysqli_fetch_assoc($result);
            }
            return $assinatura;
        } 
    }
    public function validaFimCurso(string $login,string $id_curso):void{
        $verifica= new Perfil($this->mysql);
        $cliente=$verifica->exibirPerfil($login);
        $id=$cliente['id_cliente'];
        $valida = $this->mysql->prepare("SELECT count(h.id_avaliacao) as 'count' from historico h,avaliacoes a WHERE a.id_curso=? and h.id_cliente=? and h.id_avaliacao=a.id_avaliacao");
        $valida->bind_param('ss', $id_curso,$id);
        $valida->execute();
        $assinatura= $valida->get_result()->fetch_assoc();
        $valida = $this->mysql->prepare("SELECT count(id_avaliacao) as 'count' from avaliacoes where id_curso=?");
        $valida->bind_param('s',$id_curso);
        $valida->execute();
        $count= $valida->get_result()->fetch_assoc();
        foreach($count as $x){
            $valorA=$x;
        }
        foreach($assinatura as $y){
            $valorH=$y;
        }
        if($valorH==$valorA){
            $msg='COMPLETO';
            $inserSitu = $this->mysql->prepare("UPDATE assinatura SET status_curso=? where id_curso=? and id_cliente=?;");
            $inserSitu->bind_param('sss',$msg, $id_curso, $id);
            $inserSitu->execute();
        }else{
            $msg='IMCOMPLETO';
            $inserSitu = $this->mysql->prepare("UPDATE assinatura SET status_curso=? where id_curso=? and id_cliente=?;");
            $inserSitu->bind_param('sss',$msg, $id_curso, $id);
            $inserSitu->execute();
        }
    }
}