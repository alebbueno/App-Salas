<?php include('header.php'); ?>
<link rel="stylesheet" href="css/lightbox.css">
<?php
 include('includes/mysql.php');
 
$id=$_GET['id'];  // MUDEI AQUI

// Retrieve data from database 
$sql="SELECT * FROM administrador WHERE ad_id = '".$id."' ";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

?>

<div id="container">
	
    <div id="container-add">
    	<section class="form-add">
        
<?php  

if ($id!=0){       
echo "<form name='signup' method='post' enctype='multipart/form-data' action='update-admin.php' onSubmit='return valida_dados(this)'>";
}else {
echo "<form name='signup' method='post' enctype='multipart/form-data' action='gravar-admin.php' onSubmit='return valida_dados(this)'>";
}
?>

<div class="hero-unit" style="margin-top:40px">
		<h1 style="font-size:58px">Cadastro <small>Usuário</small></h1>
</div>
<p>
</p>
<p>&nbsp;</p>

	<input name="id" type="hidden" value="<? echo $rows['ad_id']; ?>">
    
	<div class="row">    
    <div class="col-md-9">
	<label for="exampleInputEmail1">Nome Completo</label>
  	<input type="text" class="form-control" name="ad_nome" placeholder="Preencha esse campo" value="<? echo $rows['ad_nome']; ?>" required="required">
    </div>
    
    
</div>
  <br /><br />

<div class="row">
  <div class="col-md-4">
  	<label for="exampleInputEmail1">E-mail</label>
  	<input type="email" class="form-control" placeholder="E-mail valido" name="ad_usuariologin" value="<? echo $rows['ad_usuariologin']; ?>" required="required">
  </div>
  <div class="col-md-4">
  	<label for="exampleInputEmail1">Senha</label>
  	<input type="password" class="form-control" name="ad_password" value="<? echo $rows['ad_password']; ?>" required="required">	
  </div>
  
</div>
<p>&nbsp;</p>


<input name="Reset" type="reset" class="btn btn-danger" value="Limpar">
<?php  

if ($id!=0){       
echo "<input type='submit' class='btn btn-primary' value='Atualizar'>";
}else {
echo "<input type='submit' class='btn btn-info' value='Cadastar'>";
}
?>
 
</p>

</form>

<?php  

if ($id!=0){    
?>   




</div>
  
  
<?
}else {
}
?>

</section>



</div>


</div>


<script src="js/lightbox.js"></script>


<script>
    $('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
    $(prettyPrint);
</script>

</body>
</html>