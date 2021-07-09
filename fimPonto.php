<?php
    require_once("db.php"); 

    $id = $_GET['id'];   
    $tz_object = new DateTimeZone('Brazil/East');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object); 
     

    $sql="UPDATE ponto SET SAIDA = now() WHERE ID='$id'";   
   

    if (mysqli_query($conexao, $sql)) {
        echo "<b id='message'>Registro salvo com sucesso!</b>";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
    mysqli_close($conexao);

    header("Location: perfil.php");

    
?>