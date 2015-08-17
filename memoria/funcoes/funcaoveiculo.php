<?php			
			
			function listaVeiculo(){
			$sql = "SELECT * FROM cen_veiculos";
			$query = mysql_query($sql);
			echo "<select name='cen_veiculos'>";
			while($lista = mysql_fetch_array($query)){
			echo "<option value=".$lista['idVeiculos'].">".$lista['cen_veiculos']."</option>";
	}
	

?>