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
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <div class="fadeIn first">
            <img src="person.png" id="icon" alt="User Icon" />
          </div>
          <form action="Verificar.php"  method='post'>
            <input type="text" id="user" name="user" class="fadeIn second" name="login" placeholder="Usuario">
            <input type="password" id="senha" name="senha" class="fadeIn third" name="login" placeholder="Senha">
            
            <button class="btn btn-primary btn-lg">Login</button>
          </form>
          <div class="Mensage">
            <iframe style="border:none" name="frame"></iframe>
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>