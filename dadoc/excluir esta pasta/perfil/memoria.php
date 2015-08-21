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
					<input type="text" name="idRegistro" class="form-control" id="idRegistro" value="<?php echo $campo['idRegistro'] ?>" />
			</div>
		</div>			
		
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Tipo de Abordagem </label>
						<select class="form-control" name="idAbordagem" id="inputSubject">	
							<option value="1"></option>
								<?php echo geraAbordagem("mem_abordagem",$campo['idAbordagem'],"");
								?>
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
		
		<div class="form-group">
			<div class="col-md-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Atividade </label>
						<input type="text" name="atividade" class="form-control" id="atividade" value="<?php echo $campo['atividade']?>"/>
				</div>
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
		