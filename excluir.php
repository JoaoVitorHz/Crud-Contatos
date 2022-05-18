<?php
include 'banco.php';
$contato = new banco();

if(!empty($_GET['id'])){

    $id = $_GET['id'];

    $contato->excluir($id);

}
header ("Location: index.php");
