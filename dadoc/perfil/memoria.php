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

	<div class="menu-area">  <!--menu principal-->
			<div id="dl-menu" class="dl-menuwrapper">
						<button class="dl-trigger">Open Menu</button>
						<ul class="dl-menu">
							<li>
								<a href="?secao=inicio">Início</a>
							</li>
							<li><a href="?secao=perfil">Perfil de acesso</a></li>
							<li><a href="?secao=ajuda">Ajuda</a></li>
                            <li><a href="../include/logoff.php">Sair</a></li>
							
						</ul>
					</div>
	</div>		
	
	

<?php
switch($pag)
{
case "menu":
?>

<section id="contact" class="home-section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="text-hide">
	                <h4>Escolha uma opção</h4>
                </div>
            </div>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-8">
					<a href="?perfil=memoria&p=pesquisar" class="btn btn-theme btn-lg btn-block">PESQUISAR</a>
					<a href="?perfil=memoria&p=inserir" class="btn btn-theme btn-lg btn-block">INSERIR</a>
					
				</div>
			</div>
        </div>
    </div>
</section>
 
<?php 
break;
case "inserir":

?>


<?php
	if(isset($_POST['cadastrar']))
		{ 
	 // caso não esteja vazio
		$existe = mysql_num_rows(mysql_query("SELECT * FROM mem_centexto WHERE idRegistro = '$idRegistro'  = 1"));
		$idRegistro = $_POST['idRegistro'];
		$idAbordagem = $_POST['idAbordagem'];
		$idArea = $_POST['idArea'];	
		$atividade = $_POST['atividade'];	
		$dataInicio = $_POST["Y-m-d"];	
		$dataFinal = $_POST["Y-m-d"];
		$idLocal = $_POST['idLocal'];
		$idResponsavel = $_POST['idResponsavel'];
		$idResponsabilidade = $_POST['idResponsabilidade'];
		$descricao = $_POST ['descricao'];
		
	if ($existe['numero']== 0)
		{ // verifica se existe, caso não, insere.
			
			$sql_inserir = "INSERT INTO  `mem_centexto` ( `idRegistro` ,	`idAbordagem` ,`idArea` ,`atividade` ,`dataInicio` ,	`dataFinal` ,	`idLocal` ,`idResponsavel` ,`idResponsabilidade` ,`descricao`)
			";
	
	if(mysqli_query($sql_inserir))  //verifica se a query funcionou, caso sim, imprime a mensage.
		{ 
			$mensagem =  "Inserido com Sucesso! <a href='?perfil=imprensa&p=inserir'>Cadastrar outro.</a><br />";	
			//	 gravarLog($query);
			
		}
	else // caso não, imprime a mensagem.
		{ 
			$mensagem = "Erro ao inserir. Tente novamente.";		
		}	
		}
	else
		{
			$mensagem = "Champs, o cara existe. Edite ou insira outro.";
		}
	}		
		
		
		
	
	?>
	
	
	
	
<section id="inserir" class="home-section bg-white">
	<form method="POST" action="?perfil=memoria&p=inserir" class="form-horizontal" role="form">
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
 
	
	
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<h3> Coleção: SMC/Centro Cultural São Paulo </h3>			 
						<meta charset="utf-8"/>
				</div>
			</div>	
		</div>	

		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
				<label> Registro //ver como fazer pra fixar idRegistro - mem_centexto</label>
					<input type="text" name="idRegistro" class="form-control" id="idRegistro" value="<?php $campo['idRegistro']?>"  />
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
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					 <label>Área</label>
						<select class="form-control" name="idArea" id="inputSubject">
							<option value="1"></option>
								<?php echo geraArea("mem_area",$campo['idArea'],""); ?>
						</select>
				</div>
			</div>
		</div>	
		
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
				<label>Atividade</label>
					<input type="text" name="atividade" class="form-control" id="atividade" value=" <?php echo $campo['atividade'] ?>" />
			</div> 
		</div>
		
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Data Inicio </label>
						<input type="date" name="dataInicio" class="form-control" id="dataInicio" value="<?php echo $campo['dataInicio']?>"/>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Data Final </label>
						<input type="date" name="dataFinal" class="form-control" id="dataFinal" value="<?php echo $campo ['dataFinal']?>"/>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Local </label>
						<select class="form-control" name="idArea" id="inputSubject">
							<option value="1"></option>
								<?php echo geraLocal("mem_local",$campo['idLocal'],"");?>
						</select>
				</div>
			</div>
		</div> 
		
			<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
				<label>Responsavel</label>
					<input type="text" name="Responsavel" class="form-control" id="Responsavel" value=" <?php echo $campo['Responsavel'] ?>" />
			</div> 
		</div>
		
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Responsabilidade </label>
						<select class="form-control" name="idArea" id="inputSubject">
							<option value="1"></option>
								<?php echo geraResponsabilidade("mem_responsabilidade",$campo['idResponsabilidade'],"");?>
						</select>
				</div>
			</div>
		</div> 
		
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label>Descrição</label>
						<input type="text" name="descricao" class="form-control" id="descricao" value=" <?php echo $campo['descricao'] ?>" />
				</div> 
			</div>
		</div>
		
			
<div class="col-md-offset-2 col-md-8">
	
		
		
		<input type="submit" class="btn btn-theme btn-lg btn-block" value="Inserir"  />
		<input type="hidden" name="cadastrar" value="1"  />

	

</div>
		
	</form>
</section> 	

<?php } // fecha switch ?>