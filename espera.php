<?php 

include('header.php');
include('includes/mysql.php');
 
// Connect to server and select database.

$sql="SELECT * FROM espera
	INNER JOIN vendedor ON (ep_vdid = vd_id) ORDER BY ep_id DESC";
$result = mysqli_query($conexao, $sql);



?>
<div class="container">
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
<div class="col-xs-9">
	<!-- Tabela de Nivel --> 
  	<div class=" panel-form">
  		<!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Lista de Espera</h2>
            <p></p>
        </div>
  	
        <div class="row">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th width="15%">Vendedor</th>
                        <th width="15%">Cliente</th>
                        <th width="5%">Pager</th>
                        <th width="9%">Inicio</th>
                        <th width="9%">Chamada</th>
                        <th width="9%">Final</th>
                        <th width="10%">Sala</th>
                        <th width="5%">VIP</th>
                        <th width="11%">Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php while($rows = mysqli_fetch_array($result)){ 
                
                ?>
                    <tr class="odd gradeX">
                        <td><span class="text-table"><?php echo $rows['vd_nome']; ?></span></td>
                        <td><span class="text-table"><?php echo $rows['ep_cliente']; ?></span></td>
                        <td><span class="text-table"><?php echo $rows['ep_bolacha']; ?></span></td>
                        <td><span class="text-table"><?php echo $rows['ep_inicio'];  ?></span></td>
                        <td><span class="text-table"><?php echo $rows['ep_reuniao'];  ?></span></td>
                        <td><span class="text-table"><?php echo $rows['ep_final']; ?></span></td>
                        <td>
                            <?php if($rows['ep_sala'] === '') { ?>                            
                                <div class="select-sala">
                                    <select name="sala" class="select form-control multiple vd-select" id="sala" data-id="<?php echo $rows['ep_id']; ?>">
                                        <option value="0">Selecione...</option>
                                        <?php
                                        $vendedor = "SELECT * FROM salas";
                                        $result_ocupado = mysqli_query($conexao, $vendedor);
                                        while($disc = mysqli_fetch_array($result_ocupado)) { ?>
                                            <option value="<?php echo $disc['sl_nome']; ?>"><?php echo $disc['sl_nome']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <span class="text-table"><?php echo $rows['ep_sala']; ?></span>
                            <?php } ?>
                        </td>
                        <td><span class="text-table"><?php if($rows['ep_vip'] == 1) { echo '<span class="vip">vip</span>'; } ?></span></td>
                        <td><span class="text-table">
                            <?php 
                                if($rows['ep_status'] == 1) { 
                                    echo '<span class="aguardando">aguardando</span>';
                                }else if ($rows['ep_status'] == 2) {
                                    echo '<span class="finalizado">finalizado</span>';
                                }else if ($rows['ep_status'] == 3) {
                                    echo '<span class="reuniao">Em Reunião</span>';
                                }else {
                                    echo '<span class="cancelado">cancelado</span>';
                                }
                             ?>
                        </span></td>
                        <td>
                            <span class="ctas-bolacha">
                                <?php if($rows['ep_status'] == 1) { ?>
                                    <a class="link-finalizar" href="gravar/chamar-bolacha.php?id=<?php echo $rows['ep_id']; ?>">Chamar</a>
                                    <a class="link-cancelar" href="gravar/cancelar-bolacha.php?id=<?php echo $rows['ep_id']; ?>">Cancelar</a>
                                <?php }else if($rows['ep_status'] == 3) { ?>
                                    <a class="link-finalizar" href="gravar/finalizar-bolacha.php?id=<?php echo $rows['ep_id']; ?>">Finalizar</a>
                                    <a class="link-cancelar" href="gravar/cancelar-bolacha.php?id=<?php echo $rows['ep_id']; ?>">Cancelar</a>
                                <?php } ?> 
                            </span>
                        </td>
                    </tr>
                <?php } ?>   
                    
                </tbody>
            </table>
        </div>
        <br /><br />

    </div>
    
</div>


<div class="col-xs-3">
	<!-- Tabela de Nivel --> 
  	<div class="panel panel-form">
  		<!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Cadastro Pager</h2>
        </div>
  		
        <div class="row">
        	
        	<form name="signup" method="post" action="gravar/gravar-bolacha.php">
            	<!-- ID Admin -->
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

                <div class="col-md-12">
            	<!-- Nome -->
                    <div class="form-group">
                        <label for="username" class="control-label">Número da Pager<span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="text" class="form-control" id="username" name="bolacha" value="" placeholder="Digitar nome">
                            <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
            	</div>

                <div class="col-md-12">
            	<!-- Nome -->
                	
                    <!-- Nome do Nivel escolar -->
                    <div class="form-group">
                        <label class="control-label" for="gender">VIP</label>
                        <div class="fancy-select">
                            <select name="vip" class="select form-control multiple"  id="vip" >
                                 <option value="">Selecione...</option>
                                 <option value="1">Sim</option>
                                 <option value="0">Não</option>
                            </select>
                        </div>
                    </div>
                    
                    
            	</div>
              
            
        </div>
        <!-- Form footer -->
        <div class="panel-footer text-right">
    			<button type="submit" class="btn btn-edit">Salvar Dados</button>
        </div>		
        </form>	 	
        </div>
      
</div>

</div>
</div>

<script>
     document.querySelectorAll(".vd-select").forEach(function(select) {
        select.addEventListener("change", function() {
            const selectedValue = select.value;
            const dataId = select.getAttribute("data-id");

            if (selectedValue !== "0") { // Verifica se não é a opção "Selecione..."
                window.location.href = `gravar/sala-bolacha.php?id=${dataId}&sala=${selectedValue}`;
            }
        });
    });
</script>


<?php
include('footer.php');

?>