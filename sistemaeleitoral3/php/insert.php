<?php

require_once("../model/conexao.php");

extract($_POST);
$senha =  md5($_POST['senha']);
$confirmarSenha =  md5($_POST['confirmarSenha']);
$id_usuario = 0;
try{
	$stmt = $conn->prepare('INSERT INTO usuario VALUES(:id_usuario,:login,:email,:senha,:confirmarSenha)');
	$stmt->execute(array(':id_usuario'=>$id_usuario,':login'=>$login,':email'=>$email,':senha'=>$senha,':confirmarSenha'=>$confirmarSenha));
	echo  "<script> alert('Cadastro efetuado com sucesso!');window.history.go(-1);</script>\n";
} 

catch(PDOException $e){
	echo 'Error: ' . $e->getMessage();
} 

?>

