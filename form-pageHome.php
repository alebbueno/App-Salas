<?php include('header.php'); ?>
<script src="src/bootstrap3-wysihtml5.js"></script>
<link rel="stylesheet" type="text/css" href="src/bootstrap-wysihtml5.css" />

    <script src="assets/js/wysihtml5-0.3.0.js"></script>
    <script src="assets/js/jquery-1.7.2.min.js"></script>
    <script src="src/bootstrap3-wysihtml5.js"></script>
<?php
 include('includes/mysql.php');
 
// Connect to server and select database.
$sql="SELECT * FROM page_inicial WHERE pi_id = '1'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
?>

<div class="container">
<!-- Formulario de Cadastro do Usuarios -->

<div class="row">
<div class="col-xs-12">
	<!-- Tabela de Nivel --> 
  	<div class="panel panel-form">
  		<!-- Form header -->
        <div class="panel-heading">
            <h2 class="title">Conteúdo da Página Inicial</h2>
            <p><span class="required-field">*</span> - Campos obrigatórios</p>
        </div>
  		
        <div class="row">
        	
        	<form name="signup" method="post" action="gravar/gravar-pageHome.php">
            	<!-- ID Admin -->
                <input name="id" type="hidden" value="<? echo $row['pi_id']; ?>">
                
            	<div class="col-md-12">
                    <!-- Conteudo da Escola -->
                    <div class="form-group">
                        <label for="inputTextarea" class="control-label">Texto Descritivo</label>
                        <textarea class="textarea form-control" name="texto" placeholder="Digite o texto aqui ..." cols="20" rows="12"><? echo $row['pi_texto']; ?></textarea>
                    </div>
                    
              
            	</div>
                
        </div>
        <!-- Form footer -->
        <div class="panel-footer text-right">	
			<button type="submit" class="btn btn-edit">Atualizar</button>
        </div>		
        </form>	 	
        </div>
      
</div>
</div>



</div>

</div>

</div>

</body>

<script>
            $('.textarea').wysihtml5({
                "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
                "emphasis": true, //Italics, bold, etc. Default true
                "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                "html": false, //Button which allows you to edit the generated HTML. Default false
                "link": false, //Button to insert a link. Default true
                "image": false, //Button to insert an image. Default true,
                "color": false //Button to change color of font  
            });
        </script>

</html>