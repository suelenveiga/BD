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
<h2>Cadastro Cursos</h2>

<form action="inserir.php" method="post">

  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control form-control-sm" id="nome" name="nome" 
    value="<?php if($cod) echo $cli->getNome();?>" >
  </div>
  <div class="form-group">
    <label for="email">Area</label>
    <input type="nome" class="form-control form-control-sm" id="email" name="email" 
    value="<?php if($cod) echo $cli->getArea();?>">
  </div>
  <div class="form-group">
    <label for="cpf">Carga Horaria</label>
    <input type="text" class="form-control form-control-sm" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" 
    value="<?php if($cod) echo $cli->getcargaHoraria();?>">
  </div>
  <div class="form-group">
    <label for="datafundacao">data fundacao</label>
    <input type="text" class="form-control form-control-sm" id="dataFundacao" name="dataFundacao" 
    value="<?php if($cod) echo $cli->getdataFundacao();?>">
  </div>
    <?php if($cod){ ?>
    <input type="hidden" name="cod" value="<?php echo $cli->getId();?>">
    <?php } ?>
  <div class="form-group">
    <button type="submit" class="btn btn-sm btn-primary" >enviar</button>
    <button type="reset" class="btn btn-sm btn-secondary" >limpar</button>  </div>
</form>

<a href="listar.php" class="btn btn-sm active" role="button" aria-pressed="true"> << voltar</a>

<?php include_once("footer.php");?>
