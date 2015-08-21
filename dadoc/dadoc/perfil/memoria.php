<?php

//Imprime erros com o banco
@ini_set('display_errors', '1');
error_reporting(E_ALL);

if(isset($_GET['p'])){
	$pag = $_GET['p'];
}else{
	$pag = "menu"; 
}


?>  
	<div class="menu-area">
			<div id="dl-menu" class="dl-menuwrapper">
						<button class="dl-trigger">Open Menu</button>
						<ul class="dl-menu">
							<li><a href="?secao=inicio">Início</a></li>
							<li><a href="?secao=perfil">Perfil de acesso</a></li>
							<li><a href="?secao=ajuda">Ajuda</a></li>
                            <li><a href="../include/logoff.php">Sair</a></li>
							
						</ul>
					</div><!-- /dl-menuwrapper -->
	</div>	


 

<section id="inserir" class="home-section bg-white">
	<form method="POST" action="?perfil=imprensa&p=inserir" class="form-horizontal" role="form">
		<div class="form-group">       
            <div class="col-md-offset-2 col-md-8">
                <div class="text-hide">
                    <h3>Inserir novo registro</h3>
					<h4> <?php if (isset($mensagem)){echo $mensagem;} ?> </h4>					
					<meta charset="utf-8" />
                    <h1></h1>
                </div>
            </div>
		</div>
 
<section id="inserir" class="home-section bg-white">	
	<form method="POST" action="?perfil=memoria" class="form-horizontal" role="form">
		<div class="form-group">	
			<div class="col-md-offset-2 col-md-8">	
				<div class="text-hide">
					<h3> Coleção: SMC/Centro Cultural São Paulo </h3>			 
						<meta charset="utf-8"/>
				</div>
			</div>	
		</div>	

		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label> Registro //ver como fazer pra fixar idRegistro - mem_centexto</label>
					<input type="text" name="idRegistro" class="form-control" id="idRegistro"  />
			</div>
		</div>			
		
			
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					 <label>Abordagem</label>
						<select class="form-control" name="idAbordagem" id="inputSubject">
							<option value="1"></option>
								<?php echo geraAbordagem("mem_abordagem",$campo['idAbordagem'],""); ?>
						</select>
				</div>
			</div>
		</div>	
		
		<div class="form-group">
			<div class="col-md-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Área </label>
						<select class="form-control" name="idArea" id="inputSubject">
							<option value="1"></option>
								<?php echo geraArea("mem_area",$campo['idArea'],"");
								?>
						</select>
				</div>
			</div>
		</div>
		
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label>Atividade</label>
					<input type="text" name="atividade" class="form-control" id="atividade" value=" <?php echo $campo['atividade'] ?>" />
			</div> 
		</div>
		
		<div class="form-group">
			<div class="col-md-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Data Inicio </label>
						<input type="date" name="dataInicio" class="form-control" id="dataInicio" value="<?php echo $campo['dataInicio']?>"/>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-md-1 col-md-10">
				<div clas="col-md-offset-2 col-md-8">
					<label> Data Final </label>
						<input type="date" name="dataFinal" class="form-control" id="dataFinal" value="<?php echo $campo ['dataFinal']?>"/>
				</div>
			</div>
		</div>
		
		
	</form>
</section> 	