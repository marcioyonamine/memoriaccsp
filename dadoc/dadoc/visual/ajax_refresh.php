﻿<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=dadoc', 'root', 'lic54eca', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
 
$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM mem_usuario WHERE nomeUsuario LIKE (:keyword) ORDER BY nomeUsuario ASC LIMIT 0, 10";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$nomeUsuario = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['nomeUsuario']);
	// add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['nomeUsuario']).'\')">'.$nomeUsuario.'</li>';
}
?>