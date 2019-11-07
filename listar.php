<?php 
require_once('header.php');
require_once('cursoDao.php');    
require_once('curso.php');    
$cdao = new CursoDAO();
$listCli = $cdao->listar(50,0);
?>

  <h2>Lista de Cursos</h2>
  <table class="table table-sm table-responsive-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Area</th>
            <th scope="col">Carga Horaria</th>
            <th scope="col">data fundacao</th>
            <th scope="col">Opções</th>
    </tr>
  </thead>
  <tbody>
    <?php  
        foreach($listCli as $cliente){
    ?>
    <tr>
      <td> <?php echo $cliente->getId(); ?> </td>
      <td> <?php echo $cliente->getNome(); ?> </td>
      <td> <?php echo $cliente->getArea(); ?> </td>
      <td> <?php echo $cliente->getcargaHoraria(); ?> </td>
      <td> <?php echo $cliente->getdataFundacao(); ?> </td>
      <td> 
        <a href="detalhes.php?cod=<?php echo $cliente->getId(); ?>" class="btn btn-sm btn-info"> 					
          Detalhes?</a>
        <a href="inserir.php?cod=<?php echo $cliente->getId(); ?>" class="btn btn-sm btn-warning">
          Editar?</a>				
        <a href="excluir.php?cod=<?php echo $cliente->getId(); ?>" class="btn btn-sm btn-danger"> 					
          Excluir?</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<a href="inserir.php" class="btn btn-secondary active" role="button" aria-pressed="true">Inserir Cursos</a>



<?php include_once("footer.php");?>






