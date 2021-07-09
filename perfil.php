<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Gerenciamento de Funcionários</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="./style/style2.css">
  <link rel='stylesheet' type='text/css' media='screen' href='style/cad.css'>
  
  <?php 
      require_once("db.php"); 
      session_start();
      $usu = $_SESSION['usuario'];

      $usuario = mysqli_query($conexao,"SELECT * FROM funcionario WHERE USER_LOGIN = '" .$usu. "' ");
      
        while($info = mysqli_fetch_array($usuario))
        {
            $nome_usu = $info['NOME'];
            $id_usu   = $info['ID']; 
            $hierarq  = $info['HIERARQ'];

            $_SESSION['usuario'] = $usu;
        }

      ?>
</head>
<body>
<!-- partial:index.partial.html -->
    <nav class="mnb navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <i class="ic fa fa-bars"></i>
          </button>
          <div style="padding: 15px 0;">
            <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="msb" id="msb">
          <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <div class="brand-wrapper">
                <!-- Brand -->
                <div class="brand-name-wrapper">
                  <a class="navbar-brand" href="#">
                    Empresa™
                  </a>
                </div>

              </div>

            </div>

            <div class="side-menu-container">
              <ul class="nav navbar-nav">
                <li style="text-align: center"><img src="person.png" alt="Avatar" style="width:150px;border-radius: 50%"></li>
                <li class="name"><a href="#"><?php echo $nome_usu; ?></a></li>
                <?php 
                  if ($hierarq == 1){
                ?>
                <li><a onclick="change('1')" href="#"><span class="glyphicon"></span>Funcionários</a></li>
                <li><a onclick="change('2')" href="#"><i class="fa"></i>Cadastro</a></li>
                <?php } ?>
                <li><a onclick="change('3')" href="#"><i class="fa"></i>Ponto</a></li>
              </ul>
            </div>
          </nav>  
      </div>

      <div id="tab1" class="main">
          <div class="inside">
              <h2>Funcionários</h2>
                  <?php
                      
                      $funcionario = mysqli_query($conexao,"SELECT * FROM funcionario where ID_GERENTE = '" .$id_usu. "' ");

                      
                      
                      echo "<table class='tbdev' border='1'>
                      <tr>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Cargo</th>
                      <th>Último ponto</th>
                      <th>Atividade</th>
                      </tr>";
                      if($funcionario)
                      {
                        while($row = mysqli_fetch_array($funcionario))
                        {

                            $ponto = mysqli_query($conexao,"SELECT * FROM ponto where ID_FUNC = '" .$row['ID']. "' ");

                            while($row2 = mysqli_fetch_array($ponto))
                            {
                                echo "<tr>";
                                echo "<td>" . $row['NOME'] . "</td>";
                                echo "<td>" . $row['EMAIL'] . "</td>";
                                echo "<td>" . $row['CARGO'] . "</td>";
                                echo "<td>" . $row2['ENTRADA'] . "</td>";
                                echo "<td>" . $row2['ATIVIDADE'] . "</td>";
                                echo "</tr>";
                            }
                        }
                      }
                        echo "</table>";
                  ?>
          </div>
      </div>
      <div id="tab2" class="main">
        <div class="inside">
          <div class="top">
            <h1>Cadastro de Membros</h1> 
          </div>         
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
          <div class="wrapper fadeInDown">
            <div id="formCad">
                <form action="salCadFunc.php" target="frame" method='post'>
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
                <iframe style="border:none" name="frame1"></iframe>    
            </div>
          </div>
        </div>
      </div>
      <div id="tab3" class="main">
          <div class="inside">
              <h2>Ponto</h2>          
              <form class="cad" target="frame" action="ponto.php" method="post"> 

                  <label for="fname">Horário atual:</label><br>
                  <input type="date" id="currentDate" disabled><br>
                  <input type="time" id="currentTime" disabled><br><br>

                  <label for="fname">Atividade:</label><br>
                  <input style="width:70vw" type="text" id="atividade" name="atividade"><br>

                  <input type="submit" value="Bater ponto">
              </form> 
              
              <iframe style="border:none" name="frame"></iframe>

              <?php
                  $queryPont = mysqli_query($conexao, "SELECT * FROM ponto WHERE ID_FUNC = " .$id_usu. " ORDER BY ENTRADA desc");

                  if (!$queryPont) {
                      echo 'Invalid query: ' . mysqli_error($conexao) . "\n";
                      exit;
                  }
              ?>
              <table class="table table-bordered table-dark">
                <thead>
                  <th scope="col">Entrada</th>
                  <th scope="col">Atividade</th>
                  <th scope="col">Saida</th>
                </thead>
                <tbody>
                  <?php   
                    while ($row = mysqli_fetch_assoc($queryPont)) {
                      echo "<tr> <td>" . $row["ENTRADA"] . "</td> 
                            <td>" . $row["ATIVIDADE"] ."</td> 
                            <td>" . $row["SAIDA"] ."</td>
                            <td>
                            <a href='fimPonto.php?id=" . $row["ID"] . "' class='btn btn-danger btn-xs'>Finalizar</a>
                            </td>   
                            </tr>";
                    }
                  ?>
                </tbody>
              </table>
          </div>
      </div>

    </div>
</body>
<script>
      function change(tab) {
          if(tab=="1"){
              $("#tab1").css('display','flex');
              $("#tab2").css('display','none');
              $("#tab3").css('display','none');
          }else if(tab=="2"){
              $("#tab1").css('display','none');
              $("#tab2").css('display','flex');
              $("#tab3").css('display','none');
           }else{
              $("#tab1").css('display','none');
              $("#tab2").css('display','none');
              $("#tab3").css('display','flex');
           }
      }

      
      var date = new Date();
      
      var currentDate = date.toISOString().substring(0,10);
      var currentTime = date.toISOString().substring(11,16);

      document.getElementById('currentDate').value = currentDate;
      document.getElementById('currentTime').value = currentTime;
  </script>
</html>