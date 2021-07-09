<?php
    require_once("db.php"); 

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = floatval($_POST['cpf']);
    $cargo = $_POST["cargo"];
    $id_gerente = $_POST["id_gerente"];
    $id_empresa = $_POST["id_empresa"];
    $senha = $_POST["senha"];
    $user = $_POST["user"];

    $sqlLogin = "INSERT INTO login (USER, SENHA)
    VALUES ('$user', '$senha')";

    if (mysqli_query($conexao, $sqlLogin)) {
        echo "<b id='message'>Registro salvo com sucesso!</b>";
    } else {
        echo "Erro: " . $sqlLogin . "<br>" . mysqli_error($conexao);
    }

    $sql = "INSERT INTO funcionario (NOME, EMAIL, CPF, CARGO, ID_GERENTE, ID_EMPRESA, USER_LOGIN)
    VALUES ('$nome', '$email', '$cpf', '$cargo', '$id_gerente', '$id_empresa', '$user')";

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