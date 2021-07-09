<?php
    require_once("db.php"); 

    $nome = $_POST["dname"];
    $end = $_POST["dend"];
    $numero = $_POST["dnum"];
    $valor = floatval($_POST['dvl']);
    $dtini = date('Y-m-d', strtotime($_POST['dtini'])); 
    $dtfim = date('Y-m-d', strtotime($_POST['dtfim']));

    $sql = "INSERT INTO devedor (dev_nome, dev_endereco, dev_numero, dev_valor, dev_dtini, dev_dtfim)
    VALUES ('$nome', '$end', '$numero', '$valor', '$dtini', '$dtfim')";

    if (mysqli_query($conn, $sql)) {
        echo "<b id='message'>Registro salvo com sucesso!</b>";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }
mysqli_close($conn);
?>

<script>
    function hideMessage() {
          document.getElementById("message").remove();
    };
setTimeout(hideMessage, 5000);
</script>