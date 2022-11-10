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
    public function insertnota(string $id_aluno,string $id_avaliacao,string $nota,string $data,string $horario):void{
        $valida = $this->mysql->prepare('INSERT INTO historico (id_avaliacao,id_aluno,nota,dia,horario) values(?,?,?,?,?)');
        $valida->bind_param('ssss',$id_avaliacao,$id_aluno,$nota,$data,$horario);
        $valida->execute();
        //talvez colocar data e hora na mesma coluna
    }
}