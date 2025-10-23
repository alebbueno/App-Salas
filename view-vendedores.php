<?php

include('header.php');
include('includes/mysql.php');
 
// Connect to server and select database.
$sql="SELECT * FROM vendedor";
$result = mysqli_query($conexao, $sql);
	
$id = 0;
if (isset($_GET['id'])) { // If the id post variable is set
    $id = $_GET['id'];
} 

$vendedor = array();
if ($id > 0) {
	$sql_admin="SELECT * FROM vendedor WHERE vd_id = '".$id."'";
	$result_admin = mysqli_query($conexao, $sql_admin);
	$vendedor = mysqli_fetch_array($result_admin);
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
            <h2 class="title">Lista de Vendedores</h2>
            <p></p>
        </div>
  	
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th width="65%">Nome do Vendedor</th>
                    <th width="5%" align="center"></th>
                    <th width="5%" align="center"></th>
                </tr>
            </thead>
            <tbody>
             <?php while($rows = mysqli_fetch_array($result)){ ?>
                <tr class="odd gradeX">
                    <td><span class="text-table"><?php echo $rows['vd_nome']; ?></span></td>
                    <td class="center" align="center">
                    	<a class="btn btn-edit" href="view-vendedores.php?id=<?php echo $rows['vd_id']; ?>" role="button"><i class="fa fa-pencil-square-o"></i></a>
                    </td>
                    <td class="center" align="center">
                    	<a class="btn btn-delete" href="excluir/excluir-vendedor.php?id=<?php echo $rows['vd_id']; ?>" role="button"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
             <?php } ?>   
                
            </tbody>
        </table>
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
            <h2 class="title">Novo Vendedor</h2>
            
        </div>
  		
        <div class="row">
        	
        	<form name="signup" method="post" action="gravar/gravar-vendedor.php">
            	<!-- ID Admin -->                
                <input name="id" type="hidden" value="<?php echo isset($vendedor['vd_id']) ? $vendedor['vd_id'] : ''; ?>">
                
            	<div class="col-md-12">
            	<!-- Nome -->
                    <div class="form-group">
                        <label for="username" class="control-label">Nome do Vendedor <span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="text" class="form-control" id="username" name="nome" value="<?php echo isset($vendedor['vd_nome']) ? $vendedor['vd_nome'] : ''; ?>" placeholder="Digitar nome">
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
    		<?php }?>
            
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