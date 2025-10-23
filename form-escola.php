<?php include('header.php'); 

include('includes/mysql.php');

// Retrieve data from database 
$sql="SELECT * FROM escola";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

?>

<div class="container">

<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="row">
  <div class="col-xs-12 col-md-8"><div class="panel panel-form">
        <!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Dados da Escola <? echo $rows['es_nome']; ?></h2>
            <p>Informações abaixo são enviadas para o aplicativo.</p>
        </div>
        
        <div class="panel-body">
            <form name="signup" method="post" action="gravar/grava_escola.php">
                
                <!-- ID Escola -->
                <input name="es_id" type="hidden" value="<? echo $rows['es_id']; ?>">
                
                <!-- Nome Escola -->
                <div class="form-group">
                    <label for="username" class="control-label">Nome da Escola <span class="required-field">*</span></label>
                    <div class="has-feedback">
                        <input type="text" class="form-control" id="username" name="es_nome" value="<? echo $rows['es_nome']; ?>">
                        <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                
                <!-- Conteudo da Escola -->
                <div class="form-group">
                    <label for="inputTextarea-2" class="control-label">Texto Descritivo</label>
                    <textarea class="form-control" id="inputTextarea-2" cols="20" rows="6" name="es_conteudo"><? echo $rows['es_conteudo']; ?></textarea>
                </div>
                
                <!-- Email / Telefone -->
                <div class="row">
                    <div class="col-sm-8 form-group">
                        <label for="email" class="control-label">E-mail <span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="email" class="form-control" id="email" name="es_email" value="<? echo $rows['es_email']; ?>">
                            <span class="fa fa-envelope form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                    
                    <div class="col-sm-4 form-group">
                        <label for="tel" class="control-label">Telefone <span class="required-field">*</span></label>
                        <div class="has-feedback">
                            <input type="tel" class="form-control" id="email" name="es_telefone" value="<? echo $rows['es_telefone']; ?>">
                            <span class="fa fa-phone form-control-feedback" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
                
                
                
                <!-- Create button -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Salvar Dados</button>
                </div>
            </form>
        </div>
        
        <!-- Form footer -->
        <div class="panel-footer">
            <span class="required-field">*</span> - Campos obrigatórios
        </div>
    </div>
  </div>
  
  <div class="col-xs-6 col-md-4">.col-xs-6 .col-md-4</div>

</div>

</div>
					
<?php include('footer.php'); ?>                        
