<?php include('header.php'); ?>

<?php
 include('includes/mysql.php');
 
// Connect to server and select database.

$sql="SELECT * FROM administrador";
$result=mysql_query($sql);
	
$id = $_GET['id'];

if ($id > 0) {
	$sql_admin="SELECT * FROM administrador WHERE ad_id = '".$id."'";
	$result_admin=mysql_query($sql_admin);
	$admin=mysql_fetch_array($result_admin);
}



?>

<div class="container">
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
<div class="col-xs-12">
	<!-- Tabela de Nivel --> 
  	<div class="panel panel-form">
  		<!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Lista de Usuários do sistema</h2>
            <p>Informações abaixo são referentes aos usuários autorizados a usar o sistema.</p>
        </div>
  	
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th width="65%">Nome do Usuário</th>
                    <th width="5%" align="center"></th>
                    <th width="5%" align="center"></th>
                </tr>
            </thead>
            <tbody>
             <?php while($rows=mysql_fetch_array($result)){ ?>
                <tr class="odd gradeX">
                    <td><span class="text-table"><? echo $rows['AD_Nome']; ?></span></td>
                    <td class="center" align="center">
                    	<a class="btn btn-edit" href="view-admin.php?id=<? echo $rows['AD_Id']; ?>" role="button"><i class="fa fa-pencil-square-o"></i></a>
                    </td>
                    <td class="center" align="center">
                    	<a class="btn btn-delete" href="excluir/excluir-admin.php?id=<? echo $rows['AD_Id']; ?>" role="button"><i class="fa fa-trash-o"></i></a>
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
</div>

<!-- Formulario de Cadastro do Usuarios -->

<div class="row">
<div class="col-xs-2"></div>
<div class="col-xs-8">
	<!-- Tabela de Nivel --> 
  	<div class="panel panel-form">
  		<!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Cadastro de Usuários</h2>
            <p><span class="required-field">*</span> - Campos obrigatórios</p>
        </div>
  		
        <div class="row">
        	
        	<form name="signup" method="post" action="gravar/gravar-admin.php">
            	<!-- ID Admin -->
                <input name="id" type="hidden" value="<? echo $admin['AD_Id']; ?>">
                
            	<div class="col-md-4">
            	<!-- Nome -->
                    <div class="form-group">
                        <label for="username" class="control-label">Nome do Usuário <span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="text" class="form-control" id="username" name="nome" value="<? echo $admin['AD_Nome']; ?>" placeholder="Digitar nome">
                            <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
            	</div>
                <div class="col-md-4">
                    <!-- Nome -->
                    <div class="form-group">
                        <label for="username" class="control-label">Login <span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="text" class="form-control" id="username" name="login" value="<? echo $admin['AD_UsuarioLogin']; ?>" placeholder="Digitar Login">
                            <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Nome -->
                    <div class="form-group">
                        <label for="username" class="control-label">Senha <span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="password" class="form-control" id="username" name="senha" value="<? echo $admin['AD_Password']; ?>" placeholder="Senha">
                            <span class="fa fa fa-key form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            
            
        </div>
        <!-- Form footer -->
        <div class="panel-footer text-right">
			<?php if($id > 0) { ?>
				<button type="submit" class="btn btn-edit">Atualizar</button>
    		<? }else { ?>
    			<button type="submit" class="btn btn-edit">Salvar Dados</button>
    		<? }?>
            
        </div>		
        </form>	 	
        </div>
      
</div>
<div class="col-xs-2"></div>
</div>



</div>

</div>

</div>

<?php
include('footer.php');

?>