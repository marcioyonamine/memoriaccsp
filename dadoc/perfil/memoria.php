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
					<li><a href="?secao=inicio">Início</a></li>
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
case "inserir": // inicio da area de inserir na tabela contexto 

?>


<?php
	if(isset($_POST['cadastrar']))
		{ 
	 // caso não esteja vazio
		$existe = mysql_num_rows(mysql_query("SELECT * FROM mem_contexto WHERE idRegistro = '$idRegistro'  = 1"));
		$idRegistro = $_POST['idRegistro'];
		$idAbordagem = $_POST['idAbordagem'];
		$idArea = $_POST['idArea'];	
		$atividade = $_POST['atividade'];	
		$dataInicio = $_POST["Y-m-d"];	
		$dataFim = $_POST["Y-m-d"];
		$idLocal = $_POST['idLocal'];
		$idResponsavel = $_POST['idResponsavel'];
		$idResponsabilidade = $_POST['idResponsabilidade'];
		$descricao = $_POST ['descricao'];
		$idNotacao = $_POST ['idNotacao'];
		$idTipo = $_POST ['idTipo'];
		$idTecnica = $_POST ['idTecnica'];
		$idSuporte = $_POST ['idSuporte'];
		$idFormato = $_POST ['idFormato'];
		$dataComeco = $_POST ["Y-m-d"];
		$dataFinal = $_POST ["Y-m-d"];
		$idMedicao = $_POST ['idMedicao'];
		$idUrl = $_POST ['idUrl'];
		$descritor = $_POST ['descrito'];
		$acesso = $_POST ['acesso'];
		$conservacao = $_POST ['conservacao'];
		$historico = $_POST ['historico'];
		
		
		
		
	if ($existe['numero']== 0)
		{ // verifica se existe, caso não, insere.
			
			$sql_inserir = "INSERT INTO  `mem_centexto` ( `idRegistro` ,	`idAbordagem` ,`idArea` ,`atividade` ,`dataInicio` ,	`dataFim` ,	`idLocal` ,`idResponsavel` ,`idResponsabilidade` ,`descricao`,`idNotacao` ,`idTipo` ,`idTecnica` ,`idSuporte` ,`idFormato` ,`dataComeco` ,`dataFinal` ,`idMedicao` ,`idUrl` ,`descritor` ,`acesso` ,`conservacao` ,`historico`)
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
			$mensagem = "Registro já existe, edite ou insira outro.";
		}
	}		
		
		
		
	
	?>
	
	
	
	
<section id="inserir" class="home-section bg-white">  <!-- tabela principal mem_contexto-->
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
		</div>
		
			
		<div class="form-group">  <!--tabela auxiliar  mem_abordagem -->
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
		
		<div class="form-group">  <!-- tabela auxiliar mem_area -->
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
		          
     	<div class="row">
            <div class="col-md-offset-1 col-md-10">
	             <a href="?perfil=memoria&p=contexto" class="btn btn-theme btn-lg btn-block">PRÓXIMO</a>	<!--botão próximo -->
           	</div> 
        </div>
		
		
	</form>

</section>
		
		
<?php 
break;
case "contexto":  //area contexto
$inserir = $_POST['inserir'];

?>		

	<section id="contexto" class="home-section bg-white">
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<h3>Contexto</h3>	
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
						<input type="date" name="dataFim" class="form-control" id="dataFim" value="<?php echo $campo ['dataFim']?>"/>
				</div>
			</div>
		</div>
		
		
		<div class="form-group">  <!-- tabela auxiliar mem_local -->
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
		
			<div class="form-group">  <!-- tabela auxiliar mem_responsavel -->
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
				<label>Responsavel</label>
					<input type="text" name="Responsavel" class="form-control" id="Responsavel" value=" <?php echo $campo['Responsavel'] ?>" />
			</div> 
		</div>
		
		<div class="form-group">  <!-- tabela auxiliar mem_responsabilidade -->
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
		
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form method="POST" action="?perfil=evento&p=detalhe" class="form-horizontal" role="form">
		
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<label>Descrição</label>
								<textarea name="primeiroSegmento" class="form-control" rows="10" placeholder="Informações sobre conteúdo do material "><?php echo $campo["descricao"] ?></textarea>
						</div> 
					</div>		
				</form>
			</div>
		</div>
		
		<div class="row">
            <div class="col-md-offset-1 col-md-10">
	            <a href="?perfil=memoria&p=identificacao" class="btn btn-theme btn-lg btn-block">PRÓXIMO</a> <!-- botão proximo -->
            </div> 
        </div>
		
		<div class="row">
            <div class="col-md-offset-1 col-md-10">
	             <a href="?perfil=memoria&p=inserir" class="btn btn-theme btn-lg btn-block">VOLTAR</a>	<!--botão voltar -->
           	</div> 
        </div>
		
	</section>
		
<?php 
break;
case "identificacao": //area de identificacao

?>	
		<section id="identificacao" class="home-section bg-white">
		<div class="form-group"> 
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<h3>Identificação</h3>	
				</div> 
			</div>
		</div>
		
		<div class="form-group">  <!--tabela auxiliar mem_notacao -->
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<h4>Notação</h4>	
				</div> 
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form method="POST" action="?perfil=evento&p=detalhe" class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<label>Primeiro Segmento</label>
								<textarea name="primeiroSegmento" class="form-control" rows="10" placeholder="Reservado para números correspondentes aos tipos de unidades de arquivamento"><?php echo $campo["primeiroSegmento"] ?></textarea>
						</div> 
					</div>
       		
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<label>Segundo Segmento</label>
								<textarea name="segundoSegmento" class="form-control" rows="10" placeholder="Numeração atribuída ás unidades de arquivamento de cada tipo"><?php echo $campo["segundoSegmento"] ?></textarea>
						</div> 
					</div>
			
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<label>Terceiro Segmento</label>
								<textarea name="terceiroSegmento" class="form-control" rows="10" placeholder="Número atribuido a cada documento."><?php echo $campo["terceiroSegmento"] ?></textarea>
						</div> 
					</div>
				</form>
			</div>
		</div>
		
		<div class="form-group">  <!-- tabela auxiliar mem_tipo -->
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Tipo </label>
						<select class="form-control" name="idArea" id="inputSubject">
							<option value="1"></option>
								<?php echo geraTipo("mem_tipo",$campo['idTipo'],"");?>
						</select>
				</div>
			</div>
		</div> 
		
		<div class="form-group">  <!-- tabela auxiliar mem_tecnica-->
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Técnica </label>
						<select class="form-control" name="idArea" id="inputSubject">
							<option value="1"></option>
								<?php echo geraTecnica("mem_tecnica",$campo['idTecnica'],"");?>
						</select>
				</div>
			</div>
		</div> 
		
		<div class="form-group">  <!-- tabela auxiliar mem_suporte -->
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Suporte </label>
						<select class="form-control" name="idArea" id="inputSubject">
							<option value="1"></option>
								<?php echo geraResponsabilidade("mem_suporte",$campo['idSuporte'],"");?>
						</select>
				</div>
			</div>
		</div> 
		
		<div class="form-group">  <!-- tabela auxiliar mem_formato -->
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Formato </label>
						<select class="form-control" name="idArea" id="inputSubject">
							<option value="1"></option>
								<?php echo geraFormato("mem_formato",$campo['idFormato'],"");?>
						</select>
				</div>
			</div>
		</div> 
		
		<div class="form-group">
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<label> Data Inicio </label>
						<input type="date" name="dataComeco" class="form-control" id="dataComeco" value="<?php echo $campo['dataComeco']?>"/>
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
		
		<div class="col-md-offset-1 col-md-10"> <!-- tabela auxiliar mem_url -->
			<div class="col-md-offset-2 col-md-8">
				<label>URL</label>
					<input type="text" name="url" class="form-control" id="url" value=" <?php echo $campo['url'] ?>" />
			</div> 
		</div>
		
		<div class="row">
            <div class="col-md-offset-1 col-md-10">
	            <a href="?perfil=memoria&p=medicao" class="btn btn-theme btn-lg btn-block">PRÓXIMO</a>	<!-- botão proximo -->
            </div> 
        </div>
		
		<div class="row">
            <div class="col-md-offset-1 col-md-10">
	             <a href="?perfil=memoria&p=contexto" class="btn btn-theme btn-lg btn-block">VOLTAR</a>	 <!-- botão voltar -->
           	</div> 
        </div>
	</section>
		
<?php 
break;
case "medicao":  //area de medidas

?>	
		<section id="medicao" class="home-section bg-white">
		<div class="form-group">  <!--tabela auxiliar mem_medicao-->
			<div class="col-md-offset-1 col-md-10">
				<div class="col-md-offset-2 col-md-8">
					<h3>Medição</h3>	
				</div> 
			</div>
		</div>
		
	
		
	<div class="form-group">
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label>Exemplar</label>
					<input type="text" name="exemplar" class="form-control" id="exemplar" value=" <?php echo $campo['exemplar'] ?>" />
			</div> 
		</div>
			
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label>Páginas</label>
					<input type="text" name="paginas" class="form-control" placeholder="Frente // Verso" id="paginas" value=" <?php echo $campo['paginas'] ?>" />
			</div> 
		</div>
			
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label>Altura</label>
					<input type="decimal" name="altura" class="form-control" id="altura" value=" <?php echo $campo['altura'] ?>" />
			</div> 
		</div>
			
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label>Largura/Comprimento</label>
					<input type="decimal" name="larguraComprimento" class="form-control" id="larguraComprimento" value=" <?php echo $campo['larguraComprimento'] ?>" />
			</div> 
		</div>
			
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label>Profundidade</label>
					<input type="decimal" name="profundidade" class="form-control" id="profundidade" value=" <?php echo $campo['profundidade'] ?>" />
			</div> 
		</div>
			
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label>Duração</label>
					<input type="text" name="duracao" class="form-control" id="duracao" value=" <?php echo $campo['duracao'] ?>" />
			</div> 
		</div>
			
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label>Tamanho Digital</label>
					<input type="text" name="tamanhoDigital" class="form-control" id="tamanhoDigital" value=" <?php echo $campo['tamanhoDigital'] ?>"/>
			</div> 
		</div>
			
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<label>Dimensão Digital</label>
					<input type="text" name="dimensaoDigital" class="form-control" id="dimensaoDigital" value=" <?php echo $campo['dimensaoDigital'] ?>" />
			</div> 
		</div>	
	</div>
	
		<div class="row">
            <div class="col-md-offset-1 col-md-10">
	            <a href="?perfil=memoria&p=descricao" class="btn btn-theme btn-lg btn-block">PRÓXIMO</a>	<!-- botão proximo -->
           	</div> 
        </div>
		
		<div class="row">
            <div class="col-md-offset-1 col-md-10">
	             <a href="?perfil=memoria&p=identificacao" class="btn btn-theme btn-lg btn-block">VOLTAR</a>	<!-- botão voltar -->
           	</div> 
        </div>
	</section>
	
<?php 
break;
case "descricao":  //descrição avançada

?>	
	<section id="descricao" class="home-section bg-white">
	<div class="form-group"> 
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<h3>Descrição Avançada</h3>	
			</div> 
		</div>
	</div>
			
	<div class="form-group">   <!-- fazer if de acesso -->
		<div class="col-md-offset-1 col-md-10">
			<div class="col-md-offset-2 col-md-8">
				<h4>Acesso</h4>	
			</div> 
		</div>
	</div>
			
	<div class="form-group">
		<div class="col-md-offset-2 col-md-8">
			<input type="checkbox" name="livre" id="livre" /><label style="padding:0 10px 0 5px;"> Livre</label>
			<input type="checkbox" name="restrito" id="restrito" /><label style="padding:0 10px 0 5px;"> Restrito</label>			    
		</div>	
	</div>
		
		
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<form method="POST" action="?perfil=evento&p=detalhe" class="form-horizontal" role="form">
		
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<label>Conservação</label>
							<textarea name="conservacao" class="form-control" rows="10" placeholder="Informações relacionadas ao estado de conservação do documento "><?php echo $campo["descricao"] ?></textarea>
					</div> 
				</div>	
			
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<label>Histórico</label>
							<textarea name="historico" class="form-control" rows="10" placeholder="Informações relacionadas ao documento como exposições, deterioramento, empréstimo, etc "><?php echo $campo["historico"] ?></textarea>
					</div> 
				</div>	

			</form>
		</div>
	</div>
		
		</section>
		
			
<div class="col-md-offset-2 col-md-8">  <!--botão inserir -->
	
		<input type="submit" class="btn btn-theme btn-lg btn-block" value="Inserir"  /> 
		<input type="hidden" name="cadastrar" value="1"  />

</div>

<?php 
break;
case "pesquisar":  //area de pesquisa 

?>
    		
	<section id="pesquisar" class="home-section bg-white">
		<form method="POST" action="?perfil=pesquisar&p=imprensa" class="form-horizontal" role="form"> 
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="text-hide">
							<h2>Pesquisar</h2>
						</div>
					</div>
				</div>
			</div>
		</form>
			
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<form method="POST" action="?perfil=imprensa&p=resultados" class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-md-offset-2 col-md-8">
						<label>Digite o ??????????????.</label>
							<input type="text" name="pesquisa" class="form-control" id="pesquisa" placeholder="????????????????????????????????..." />	
							<input type="submit" class="btn btn-theme btn-lg btn-block" value="PESQUISAR" />		
					</div> 
				</div>
		</div>
	</div>

	<div class="row">
		<label>Últimos cadastrados</label>
	</div>
		
			</form>
	</section> 	

<?php } // fecha switch ?>