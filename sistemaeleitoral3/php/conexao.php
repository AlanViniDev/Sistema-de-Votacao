<?php
  $conn = new PDO('mysql:host=localhost;dbname=votacao;', 'root', '') or die ('Erro ao conectar com banco de dados');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>