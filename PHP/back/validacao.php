<?php 
    class valida 
{
    private $mysql;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function valida(string $id_questao,string $opcao):int{
        $valida = $this->mysql->prepare('SELECT * from questoes where id_questao=?');
        $valida->bind_param('s',$id_questao);
        $valida->execute();
        $questao= $valida->get_result()->fetch_assoc();
        if($questao['resposta']==$opcao){
            return 1;
        }else{
            return 0;
        }
    }
    public function insertnota(string $id_cliente,string $id_avaliacao,string $nota,string $agora):void{
        $valida = $this->mysql->prepare('INSERT INTO historico (id_avaliacao,id_cliente,nota,hora_data) values(?,?,?,?)');
        $valida->bind_param('ssss',$id_avaliacao,$id_cliente,$nota,$agora);
        $valida->execute();
    }
    public function insertOp(string $id_avaliacao,string $id_questao,string $opcao,string $id_cliente):void{
        $valida = $this->mysql->prepare('INSERT INTO respostas (id_avaliacao,id_cliente,id_questao,opcao) values(?,?,?,?)');
        $valida->bind_param('ssss',$id_avaliacao,$id_cliente,$id_questao,$opcao);
        $valida->execute();
    }
}