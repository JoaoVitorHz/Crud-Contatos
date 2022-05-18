<?php
    include "banco.php";

    $cadastro = new banco();
    $cadastro->cadastro("João", "Araujo", "91478945811", "123456", "vitorjoao39207@gmail.com", "gomes3213@gmail.com", "12345678901");


    print_r($cadastro->getAll());

