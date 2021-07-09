<?php
$conexao = mysqli_connect("localhost", "root", "", "web_ponto");

mysqli_set_charset($conexao, "utf8mb4");

if(!$conexao) {
  echo "ERRO: Não foi possível conectar em seu banco de dados";
  exit;
}
?>
