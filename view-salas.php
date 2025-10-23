<?php

include('header.php'); 
include('includes/mysql.php');
 
// Connect to server and select database.

$sql = "SELECT * FROM salas";
$result = mysqli_query($conexao, $sql);

$id = 0;
if (isset($_GET['id'])) { // If the id post variable is set
   $id = $_GET['id'];
} 

$sala = array();
if ($id > 0) {
	$sql_sala = "SELECT * FROM salas WHERE sl_id = '".$id."'";
	$result_sala = mysqli_query($conexao,   $sql_sala);
	$sala = mysqli_fetch_array($result_sala);
}


?>

<div class="container">
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
<div class="col-xs-8">
	<!-- Tabela de Nivel --> 
  	<div class="panel panel-form">
  		<!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Lista dos Espaços para Reunião</h2>
            <p></p>
        </div>
  	
        <div class="row">
             <?php while($rows = mysqli_fetch_array($result)){ ?>
                <div class="col-xs-3 text-center margem-linha">
                	<span class="bt-excluir"><a href="excluir/excluir-salas.php?id=<?php echo $rows['sl_id']; ?>" role="button"><i class="fa fa-times"></i></a></span>
                	<span class="bloco-mesa"><a href="view-salas.php?id=<?php echo $rows['sl_id']; ?>" role="button"><?php echo $rows['sl_nome']; ?></a></span>
                </div>
             <?php } ?>   
        </div>
        <br /><br />
        <!-- Form footer -->
        <div class="panel-footer">
            
        </div>
    </div>
    
</div>

<div class="col-xs-4">
	<!-- Tabela de Nivel --> 
  	<div class="panel panel-form">
  		<!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Novo Cadastro</h2>
        </div>
  		
        <div class="row">
        	
        	<form name="signup" method="post" action="gravar/gravar-sala.php">
            	<!-- ID Admin -->
                <input name="id" type="hidden" value="<?php echo isset($sala['sl_id']) ? $sala['sl_id'] : ''; ?>">
                
            	<div class="col-md-12">
            	<!-- Nome -->
                    <div class="form-group">
                        <label for="username" class="control-label">Espaço de Reunião<span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="text" class="form-control" id="username" name="nome" value="<?php echo isset($sala['sl_nome']) ? $sala['sl_nome'] : ''; ?>" placeholder="Digitar nome">
                            <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
            	</div>
              
            
                </div>
                <!-- Form footer -->
                <div class="panel-footer text-right">
                    <?php if($id > 0) { ?>
                        <button type="submit" class="btn btn-edit">Atualizar</button>
                    <?php }else { ?>
                        <button type="submit" class="btn btn-edit">Salvar Dados</button>
                    <?php } ?>
                    
                </div>		
            </form>	 	
        </div>
      
</div>

</div>

</div>

</div>

</div>

<?php
include('footer.php');

?>