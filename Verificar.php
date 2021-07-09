<?php
    require_once("db.php"); 
    session_start();

    $user = $_POST['user'];
    $senha = $_POST['senha'];

    $query = mysqli_query($conexao, "SELECT * FROM login WHERE USER = '" . $user. "' AND SENHA = '" .$senha. "' ");

    if (!$query) {
        echo 'Invalid query: ' . mysqli_error($conexao) . "\n";
        exit;
    }

    if(mysqli_fetch_assoc($query) == 0){
        
        echo "<script>
                alert('Informações incorretas!');
                javascript:window.location='login.php';
            </script>";
      
        
        mysqli_close($conexao);
    }else{
        $_SESSION['usuario'] = $user;
        header("Location: perfil.php");
    }
    
?>

<script>
    function hideMessage() {
          document.getElementById("message").remove();
    };
    setTimeout(hideMessage, 5000);
</script>