<?php require_once("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' type='text/css' media='screen' href='style/style.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
      // se chegarmos até aqui é sucesso!
      $queryGerente = mysqli_query($conexao, "SELECT * FROM funcionario WHERE ID_GERENTE = 0 ORDER BY NOME ASC");

      if (!$queryGerente) {
        echo 'Invalid query: ' . mysqli_error($conexao) . "\n";
        exit;
      }

      $queryEmpresa = mysqli_query($conexao, "SELECT * FROM empresa ORDER BY NOME_EMP ASC");

      if (!$queryEmpresa) {
        echo 'Invalid query: ' . mysqli_error($conexao) . "\n";
        exit;
      }
?>
<body>
    <header>
        <div class="top">
            <h1>Cadastro</h1>
        </div>
    </header>
    <div class="wrapper fadeInDown">
        <div id="formCad">
            <form action="salCadFunc.php" method='post'>
                <input type="text" id="nome" name="nome" class="fadeIn second" name="login" placeholder="Nome">
                <input type="text" id="user" name="user" class="fadeIn second" name="login" placeholder="Nome de usuario">
                <input type="text" id="email" name="email" class="fadeIn second" name="login" placeholder="E-mail">
                <input type="text" id="cpf" name="cpf" class="fadeIn second" name="login" placeholder="CPF">
                <input type="text" id="cargo" name="cargo" class="fadeIn second" name="login" placeholder="Cargo">
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01" name="id_gerente">
                        <option selected value="0"></option>
                        <?php
                            while ($row = mysqli_fetch_assoc($queryGerente)) {
                                echo "<option value= '".$row["ID"] ."'>".$row["NOME"] ."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect01" name="id_empresa">
                        <?php
                            while ($row = mysqli_fetch_assoc($queryEmpresa)) {
                                echo "<option value= '".$row["ID"] ."'>".$row["NOME_EMP"] ."</option>";
                            }
                        ?>
                    </select>
                </div>
                <input type="text" id="senha" name="senha" class="fadeIn third" name="login" placeholder="Senha">
                <div class="but">
                    <button class="btn btn-primary btn-lg">Cadastrar</button>    
                </div>            
            </form>      
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>