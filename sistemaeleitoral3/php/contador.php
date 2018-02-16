<?php
require_once ("../model/conexao.php");

$lula = 0;
$bolsonaro = 0;
$nulo = 0;
$lula_total = 0;
$bolsonaro_total = 0;
$nulo_total = 0;

/* Validacao */
if (isset($_POST['lula'])){
    $lula += 1;
}
if (isset($_POST['bolsonaro'])){
    $bolsonaro += 1;
}
if (isset($_POST['nulo'])){
    $nulo = $nulo +1;
}

if (isset($_POST['lula']) && isset($_POST['bolsonaro']) && isset($_POST['nulo'])){
	echo  "<script> alert('Marque apenas uma opção!');window.history.go(-1);</script>\n";	
}

else if (!isset($_POST['lula']) && !isset($_POST['bolsonaro']) && !isset($_POST['nulo'])){
echo  "<script> alert('Marque uma opção!');window.history.go(-1);</script>\n";		
}
else if (isset($_POST['lula']) && isset($_POST['bolsonaro'])){
	echo  "<script> alert('Marque apenas uma opção!');window.history.go(-1);</script>\n";		
}
else if (isset($_POST['lula']) && isset($_POST['nulo'])){
	echo  "<script> alert('Marque apenas uma opção!');window.history.go(-1);</script>\n";	
}
else if (isset($_POST['bolsonaro']) && isset($_POST['nulo'])){
	echo  "<script> alert('Marque apenas uma opção!');window.history.go(-1);</script>\n";		
}

else{
	try{
    // insercao dos votos de 1 em 1
    $stmt = $conn->prepare('INSERT INTO votacao VALUES(:lula,:bolsonaro,:nulo)');
    $stmt->execute(array(':lula'=>$lula,':bolsonaro'=>$bolsonaro,':nulo'=>$nulo));
    // soma dos votos totais
    $stmt = $conn->prepare('INSERT INTO total_votos SELECT SUM(lula) AS lula, SUM(bolsonaro) AS bolsonaro, SUM(nulo) AS nulo FROM votacao');
    $stmt->execute(array(':lula_total'=>$lula_total,':bolsonaro_total'=>$bolsonaro_total,':nulo_total'=>$nulo_total));
    echo  "<script> alert('Voto gravado com sucesso!');window.history.go(-1);</script>\n";
}

catch(PDOException $e){
    echo 'Error: ' . $e->getMessage();
}
}
?>
