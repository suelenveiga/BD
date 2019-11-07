<?php
require_once('cursoDao.php');    
require_once('curso.php');
$id = isset($_POST['id']);
$cli = new Curso($_POST['nome'],$_POST['area'],$_POST['cargaHoraria'],$_POST['dataFundacao']);
$cdao = new CursoDAO();
//se o cod existe então é um UPDATE, senão é um INSERT
if($id){
    $cli->setId(intval($_POST['id']));
    $cdao->alterar($cli);
}
else{
    $cdao->inserir($cli);
}
//redireciona para o listar.php
header("Location: listar.php");

?>