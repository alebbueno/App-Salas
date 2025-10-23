<?php 

include('header.php');
include('includes/mysql.php');
 
// Connect to server and select database.

$sql="SELECT * FROM salas";
$result = mysqli_query($conexao, $sql);
	
$id = '';
if (isset($_GET["id"])) {
    $id = $_GET['id'];
}

if ($id > 0) {
	$sql_sala="SELECT * FROM salas WHERE sl_id = '".$id."'";	
    $result_sala = mysqli_query($conexao, $sql_sala);
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
             <?php while($rows=mysqli_fetch_array($result)){ 
				 
				 $status = $rows['sl_status'];
				 $sl_id = $rows['sl_id'];
				 if ($status == 1) {
					 
					 	$sql_ocupado="SELECT ht_id, vd_nome, ht_cliente, vd_id FROM historico 
										INNER JOIN salas ON (ht_slid = sl_id AND ht_status = sl_status)
										INNER JOIN vendedor ON (ht_vdid = vd_id) WHERE sl_id = '".$sl_id."'";
                        $result_ocupado = mysqli_query($conexao, $sql_ocupado);
						$ocupado = mysqli_fetch_array($result_ocupado);
					 
					?>
                    
                <div class="box-mesa text-center margem-linha">
                	
                    
                    <span class="bloco-mesa-ocupado">
                    	<a href="gravar/gravar-limpar.php?sl_id=<?php echo $rows['sl_id']; ?>&ht_id=<?php echo $ocupado['ht_id']; ?>&vd_id=<?php echo $ocupado['vd_id']; ?>" role="button" ><br>
								<?php echo $rows['sl_nome']; ?><br>
                                <?php echo $ocupado['vd_nome']; ?><br>
                                <?php echo $ocupado['ht_cliente']; ?>
                                
                                
                                
					</a></span>
                    
                    
                    
                </div>
              <?php       
				 } else if ($status == 2) {
			 ?>
			 
                <div class="box-mesa text-center margem-linha">
                	<span class="bloco-mesa-limpeza"><a href="gravar/gravar-livre.php?sl_id=<?php echo $rows['sl_id']; ?>" role="button"><?php echo $rows['sl_nome']; ?></a></span>
                </div>
             <?php } else { ?>
             	<div class="box-mesa text-center margem-linha">
                	<span class="bloco-mesa"><a href="home.php?id=<?php echo $rows['sl_id']; ?>" role="button"><?php echo $rows['sl_nome']; ?></a></span>
                </div>
             <?php      
				 } }
			 ?>   
        </div>
        <br /><br />
        <!-- Form footer -->
        <div class="panel-footer">
            <p><img src="assets/imagens/legenda.png" width="650" height="60" alt=""/></p>
        </div>
    </div>
    
</div>

<?php    
	if ($id > 0) {
			 ?>   

<div class="col-xs-4">
	<!-- Tabela de Nivel --> 
  	<div class="panel panel-form">
  		<!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Status Mesa</h2>
        </div>
  		
        <div class="row">
        	
        	<form name="signup" method="post" action="gravar/gravar-atendimento.php">
            	<!-- ID Admin -->
                <input name="sl_id" type="hidden" value="<?php echo $sala['sl_id']; ?>">
                
            	<div class="col-md-12">
            	<!-- Nome -->
                    <div class="form-group">
                        <label for="username" class="control-label">Qual a Mesa<span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="text" class="form-control" id="username" name="nome" value="<?php echo $sala['sl_nome']; ?>" placeholder="Digitar nome">
                            <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
            	</div>
                
                
                
                <div class="col-md-12">
            	<!-- Nome -->
                	
                    <!-- Nome do Nivel escolar -->
                    <div class="form-group">
                        <label class="control-label" for="gender">Vendedor</label>
                        <div class="fancy-select">
                            <select name="vd_id" class="select form-control multiple"  id="vd_id" >
                                 <option value="0">Selecione...</option>
                                 <?php
								 $vendedor = "SELECT * FROM vendedor WHERE vd_status = 0";
                                 $result_ocupado = mysqli_query($conexao, $vendedor);
								 while($disc = mysqli_fetch_array($result_ocupado)) { ?>
                                 <option value="<?php echo $disc['vd_id']; ?>"><?php echo $disc['vd_nome']; ?></option>
                                 <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    
            	</div>
                
                <div class="col-md-12">
            	<!-- Nome -->
                    <div class="form-group">
                        <label for="username" class="control-label">Nome do Cliente<span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="text" class="form-control" id="username" name="cliente" value="" placeholder="Digitar nome">
                            <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
            	</div>
              
            
        </div>
        <!-- Form footer -->
        <div class="panel-footer text-right">
        
        		<a href="home.php">
        		<button type="button" class="btn btn-danger">Cancelar</button>
        		</a>
			<?php if($id > 0) { ?>
			<button type="submit" class="btn btn-edit">Atualizar</button>
    		<?php }else { ?>
    			<button type="submit" class="btn btn-edit">Salvar Dados</button>
    		<?php }?>
            
        </div>		
        </form>	 	
        </div>
      
</div>

<?php       
				 } 
			 ?>   

</div>
</div>
<?php
include('footer.php');

?>