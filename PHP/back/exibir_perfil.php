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
    public function exibirHistorico(string $id): array
    {
        $selecionaHistorico = $this->mysql->prepare("SELECT * FROM historico WHERE id_cliente = ?");
        $selecionaHistorico->bind_param('s', $id);
        $selecionaHistorico->execute();
        $historico = $selecionaHistorico->get_result()->fetch_assoc();
        return $historico;
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
            .href='http://localhost/Job%20for%20All/Job-for-All/index.php';</script>";
        }
    }
}