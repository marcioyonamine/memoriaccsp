<section id="pesquisar" class="home-section bg-white">
	<form method="POST" action="?perfil=memoria&p=pesquisar" class="form-horizontal" role="form"> 
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
        <form method="POST" action="?perfil=memoria&p=pesquisar" class="form-horizontal" role="form">
       		 <div class="form-group">
            	<div class="col-md-offset-2 col-md-8">
            		<label>Digite o ???? </label>
					<input type="text" name="pesquisa" class="form-control" id="pesquisa" placeholder="nome do jornalista, veículo, redes sociais..." />	
					<input type="submit" class="btn btn-theme btn-lg btn-block" value="PESQUISAR" />
					
											
            	</div> 
            </div>
	</div>
</div>

<div class="row">
	<label>Últimos cadastrados</label>

<?php
	if(isset($_GET['lim'])){
		$limite = $_GET['lim'];
	}else{
		$limite = 20;
	}
		$sql_ultimos = "SELECT * FROM imp_jornalistas WHERE imp_jornalistas.publicado = '1' ORDER BY imp_jornalistas.idJornalista DESC LIMIT $limite";
		$query_ultimos = mysql_query($sql_ultimos);
	while($imp_jornalistas = mysql_fetch_array($query_ultimos)){

?>
	<p> <a href="?perfil=imprensa&p=exibir&id=<? echo $imp_jornalistas['idJornalista'] ?>" /> <? echo $imp_jornalistas['nome'] ?>, <? echo $imp_jornalistas['empresa'] ?>, twitter: <? echo $imp_jornalistas['twitter'] ?> </a> </p>


<?php
	}
?>
	
</div>
		</form>
</section>