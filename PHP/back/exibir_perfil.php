<?php

class Perfil
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function exibirPerfil(string $id): array
    {
        $selecionaPerfil = $this->mysql->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
        $selecionaPerfil->bind_param('s', $id);
        $selecionaPerfil->execute();
        $perfil = $selecionaPerfil->get_result()->fetch_assoc();
        return $perfil;
    }
}