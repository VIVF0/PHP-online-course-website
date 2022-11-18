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
}