<?php 
require_once('header.php');
require_once('cursoDao.php');    
require_once('curso.php');
$cod = isset($_GET['id']);

if($cod){
  $cod = $_GET['id'];
  $cdao = new CursoDAO();
  $cli = $cdao->buscar(intval($cod));
}
?>
<h2>Detalhes Curso</h2>

<ul class="list-group">
  <li class="list-group-item active"><?= $cli->getNome()." (id:".$cli->getId().")";?></li>
  <li class="list-group-item"><?php echo "Area: ".$cli->getArea();?></li>
  <li class="list-group-item"><?php echo "Carga Horaria: ".$cli->getcargaHoraria();?></li>
  <li class="list-group-item"><?php echo "data Fundacao: ".$cli->getdataFundacao();?></li>
</ul>

<a href="listar.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>

<?php include_once("footer.php");?>
