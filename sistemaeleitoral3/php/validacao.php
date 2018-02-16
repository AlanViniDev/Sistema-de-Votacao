<?php
// chama a conexao com o banco de dados
require_once("../model/conexao.php");

// o @ e para não dar undefined index caso  o usuario va utilizar o formulario de login
// quando chamar a validacao se não usar @ ele mostra undefine pois não no login ele não recebe dados
$campo = @$_GET['campo'];
$valor = @$_GET['valor'];

// Validando o campo login
if ($campo == "login"){
	$data = $conn->query('SELECT (COUNT(login)) AS tst FROM usuario WHERE login = ' . $conn->quote($valor));
	$f = $data->fetch();
	$result = $f["tst"];
	if ($result >= 1){
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>O usuario já está cadastrado!</p>";
	}
	else if ($valor == ""){
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Qual seu nome ?</p>";	
	}
	elseif (strlen($valor) > 28){
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Máximo 28 caracteres!</p>";				
	} elseif (strlen($valor) < 4){
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Minimo 4 caracteres!</p>";	
	}
	else{
		echo "<p style = 'color:green;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Valido!</p>";	
	}
}

// Validando o campo email
if ($campo == "email"){
	$data = $conn->query('SELECT (COUNT(email)) AS tst FROM usuario WHERE email = ' . $conn->quote($valor));
	$f = $data->fetch(); 
	$result = $f["tst"];
	if ($result >= 1){
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>O email já está cadastrado!</p>";
	}
	else if ($valor == ""){
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Qual seu e-mail ?</p>";
	}
	else if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$valor)){
		echo "<p style = 'color:green;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Valido!</p>";	
	}
	else{
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Invalido!</p>";		
	}
	}
//Validando o campo senha	
if ($campo == "senha"){
	if (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$valor)){
		echo "<p style = 'color:green;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>forte!</p>";
	} 
    else if (!preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$valor)){
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Fraca!</p>";
	}
	}
	
//Validação do campo emaillogin do formulario de entrar
if ($campo == "emaillogin"){
	$data = $conn->query('SELECT (COUNT(email)) AS tst FROM usuario WHERE email = ' . $conn->quote($valor));
	$f = $data->fetch();
	$result = $f["tst"];
	if ($result >= 1){
		echo "<p style = 'color:green;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Valido!</p>";
	}
	else if ($valor == ""){
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>Qual seu e-mail ?</p>";
	}else{
		echo "<p style = 'color:red;position:relative;top:-16.5px;float:right;font-family:Montserrat;'>E-mail invalido ou não está cadastrado!</p>";
	}
	}

if ($_POST){
	$senhalogin = $_POST['senhalogin'];
	$data = $conn->query('SELECT (COUNT(senha)) AS tst FROM usuario WHERE senha = ' . $conn->quote($senhalogin));
	$f = $data->fetch();
	$result = $f["tst"];
		if ($result >= 1){
		header('Location:../views/dentro.php');
	}
	else{
		echo  "<script> alert('Usuario ou senha invalidos!');window.history.go(-1);</script>\n";
	}
	}
	//acentuação
	header("Content-Type: text/html; charset=UTF-8",true);
	?>