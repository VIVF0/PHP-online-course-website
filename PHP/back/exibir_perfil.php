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
        $selecionaPerfil = $this->mysql->prepare("SELECT * FROM usuarios WHERE login = ?");
        $selecionaPerfil->bind_param('s', $login);
        $selecionaPerfil->execute();
        $perfil = $selecionaPerfil->get_result()->fetch_assoc();
        return $perfil;
    }
}