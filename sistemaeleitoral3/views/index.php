<!DOCTYPE html>
<html lang = "pt-br" xmlns="http://www.w3.org/1999/xhtml">

<!-- Declaração de links, meta tags e icons -->
<head>
<title>Sistema Eleitoral</title>
<link rel="stylesheet" type="text/css" href = "style/styleIndex.css"/>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<script src="js/jquery-3.0.0.min.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="style/styleform.css" />
<meta charset = "UTF-8"/>
<script src = "js/ajaxCadastro.js"></script>
</head>

<!-- Corpo do documento html -->
<body>
<!-- topo -->
<section>
<h1 class = "title">Sistema Eleitoral</h1>
<header>
<ul class="menu">
<li></li>
<li></li>
<li></li>
</ul>
<nav>
<ul>
<li><div class = "m"><a href = "index.php">INICIO</a></div></li>
<li><div class = "m"> <a href = "#" id= "login_form">ENTRAR</a> </div></li>
<li><div class = "m"><a href =  "votar.html">VOTAR</a></div></li>
<li<div class = "m"><a href = "#" id="register_form">CADASTRE-SE</a></div></li>
</ul>
</nav>
</header>
</section>


<!-- Formulario de login do usuario  -->
<div class = "user_login">
<form method = "POST" action = "../php/validacao.php">
<div class = "label_form">
<div class = "entrar">
<input type="email" name = "emaillogin" placeholder = "Email" required id = "emaillogin"  onblur="validarDados('emaillogin', document.getElementById('emaillogin').value);"/>
<div id = "campo_emaillogin"> </div> </br>
<input type = "password" name = "senhalogin" placeholder = "Senha" required id = "senhalogin"  />
<div id = "campo_senhalogin"></div> </br>
</div>

<div class = "mbtn posi">
<button href = "#"  type = "submit" id = "btnCadastrar" class="btn_green">ENTRAR</button>
</br>
<button href = "#"  type = "submit" class="btn back_btn">SAIR</button>
</div>
</div>
</form>
</div>



<!-- Formulario de cadastro do usuario  -->

<div class="user_register">
<form method = "POST" action = "../php/insert.php">
<div class = "label_form">
<input type="text" name = "login"  placeholder = "Nome" required id = "login" onblur="validarDados('login', document.getElementById('login').value);"/>
<div id="campo_login"> </div> <br /> 
<input type="email" name = "email" placeholder = "Email" required id = "email"  onblur="validarDados('email', document.getElementById('email').value);"/>
<div id="campo_email"> </div> <br />
<input type="password"  name = "senha" placeholder = "Senha" required id = "senha"  onblur="validarDados('senha', document.getElementById('senha').value);"/>
<div id="campo_senha"> </div> <br />
<input type="password"  name = "confirmarSenha" placeholder = "Confirmar senha" required id = "confirmarSenha"  onblur="validarDados('confirmarSenha', document.getElementById('confirmarSenha').value);"/>
<div id="campo_confirmarSenha"> </div> <br />
</div>
<div class = "mbtn">
<button href = "#"  type = "submit" class="btn_green">CADASTRE</button>
</br>
<button href = "#"  type = "submit" class="btn back_btn">SAIR</button>
</div>	
</form>
</div>


<!-- rodape -->
<footer></footer>

<script src = "js/validaForm.js"></script>
<script src = "http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>



<script> 
$('.menu').click(function () {
	$('.menu').toggleClass('on', function () {});
	$('nav').slideToggle(400, function () {});
	});
</script>

<script type="text/javascript">
$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
$(function(){
    // Calling Login Form
	$("#login_form").click(function(){
	$(".social_login").hide();
	$(".user_login").show();
	return false;
});
// Calling Register Form
$("#register_form").click(function(){
	$(".social_login").hide();
	$(".user_register").show();
	$(".header_title").text('Register');
	return false;
});
// Going back to Social Forms
$(".back_btn").click(function(){
	$(".user_login").hide();
	$(".user_register").hide();
	$(".social_login").show();
	$(".header_title").text('Login');
	return false;
});
})
</script>

</body>
</html>