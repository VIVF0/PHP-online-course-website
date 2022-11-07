<?php

$mysql = mysqli_connect('localhost', 'root', '', 'job_for_all');
$mysql->set_charset('utf8');

if ($mysql == FALSE) {
    echo "Erro na conexão";
}