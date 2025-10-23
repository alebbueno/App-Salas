<?php

include('header.php'); 
include('includes/mysql.php');

$sql="SELECT * FROM historico 
	INNER JOIN salas ON (ht_slid = sl_id)
	INNER JOIN vendedor ON (ht_vdid = vd_id)";

$result = mysqli_query($conexao, $sql);
	
	
	
?>

<div class="container">
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
<div class="col-xs-12">
	<!-- Tabela de Nivel --> 
  	<div class="panel panel-form">
  		<!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Relatório de Atendimento</h2>
            <p>Informações abaixo são referentes aos acessos de vendedores feitos nas salas de reunião.</p>
            <div style="float:right; margin-top:-42px;">
            <a class="btn btn-edit" href="download.php" role="button">Download</a>
            </div>
        </div>
  	
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th width="30%">Nome do Vendedor</th>
                    <th width="20%">Nome do Cliente</th>
                    <th width="20%">Sala de Reunião</th>
                    <th width="10%">Data</th>
                    <th width="10%">Entrada</th>
                    <th width="10%">Saída</th>
                </tr>
            </thead>
            <tbody>
             <?php while($rows = mysqli_fetch_array($result)){ 
			 
			 ?>
                <tr class="odd gradeX">
                    <td><span class="text-table"><?php echo $rows['vd_nome']; ?></span></td>
                    <td><span class="text-table"><?php echo $rows['ht_cliente']; ?></span></td>
                    <td><span class="text-table"><?php echo $rows['sl_nome']; ?></span></td>
                    <td><span class="text-table"><?php echo date('d/m/Y',strtotime($rows['ht_data']));  ?></span></td>
                    <td><span class="text-table"><?php echo $rows['ht_entrada']; ?></span></td>
                    <td><span class="text-table"><?php echo $rows['ht_saida']; ?></span></td>
                </tr>
             <?php } ?>   
                
            </tbody>
        </table>
        <!-- Form footer -->
        <div class="panel-footer">
            
        </div>
    </div>
    
</div>
</div>

</div>

</div>

</div>

<?php
include('footer.php');

?>