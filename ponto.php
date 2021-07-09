<?php
    require_once("db.php"); 
    session_start();
    $usu = $_SESSION['usuario'];

    $usuario = mysqli_query($conexao,"SELECT * FROM funcionario WHERE LOGIN = '" .$usu. "' ");
    
    while($info = mysqli_fetch_array($usuario))
    {
        $nome_usu = $info['NOME'];
        $id_usu   = $info['ID']; 
        $hierarq  = $info['HIERARQ'];
    }

    $ativ = $_POST["atividade"];

    $sql = "INSERT INTO ponto (ID_FUNC, ENTRADA, ATIVIDADE)
    VALUES ('$id_usu', now(), '$ativ')";

    if (mysqli_query($conexao, $sql)) {
        echo "<b id='message'>Registro salvo com sucesso!</b>";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
mysqli_close($conexao);
?>

<script>
    function hideMessage() {
          document.getElementById("message").remove();
    };
setTimeout(hideMessage, 5000);
</script>