<?php

$mysql = mysqli_connect('localhost', 'root', '', 'job_for_all');
if ($mysql == FALSE) {
    echo "Erro na conexão";
}