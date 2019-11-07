<?php
require_once('cursoDao.php');    
$cod = $_GET['id'];
$cdao = new CursoDAO();

if($cod!==null)    $cdao->deletar($cod);


//redireciona para o listar.php
header("Location: listar.php");

?>