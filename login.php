<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/521a3c16fd.js" crossorigin="anonymous"></script>
</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/521a3c16fd.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="./style.css">

    </head>

    <body>

<!-- INÍCIO MENU SOBRE -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="assets/logo.png" class="img-fluid" alt="Imagem responsiva"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- FIM MENU SOBRE -->

        <div class="container">


            <div class=" form-group row d-flex justify-content-center mt-3 mr-5">
               <hr>
                <div class=" bg-dark mt-5 col-4 rounded " id="login">
                    <br>
                    <h3 class=" mt-5 ml-3 text-light">Login</h3>

                    <form class="mt-5" name="formlogin" action="login.php" method="post">
                        <div class="form-group col-md-12 mt-4 text-light">
                            <label for="exampleDropdownFormEmail1 ">E-mail</label>
                            <input type="email" class="form-control" id="exampleDropdownFormEmail1"
                                placeholder="email@exemplo.com" name="email">
                        </div>
                        <div class="form-group  col-md-12 text-light">
                            <label for="exampleDropdownFormPassword1">Senha</label>
                            <input type="password" class="form-control" id="exampleDropdownFormPassword1"
                                placeholder="Senha" name="senha">
                        </div>
                        <button type="submit" class="btn btn-warning ml-3" name="botaoLogin">Entrar</button>
                    </form>
                    <div class=" mt-4 ">
                        <a class="font-weight-light ml-3 text-light" href="./registreSe.php">Novo por aqui? Regitre-se.</a>
                        <?php fazerLogin(); ?>
                    </div>
                </div>

                <div class=" ml-5">
                    <img src="assets/img2.png" class=" " alt="">
                </div>
            </div>

            <div>

            </div>





        </div>



    </body>

    </html>

    </html>


<?php
function fazerLogin()
{
    if (isset($_POST["botaoLogin"])) {
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $conexao = new mysqli("sql202.epizy.com", "epiz_30448384", "edlfti6uRBg", "epiz_30448384_db_projeto");
        $sql = "select * from administrador where email_admin='$email' AND senha= md5('$senha')";
        $resultado = mysqli_query($conexao, $sql);

        if ($reg = mysqli_fetch_array($resultado)) {

            header("location: consulta.php");
        } else {
            echo "
                    <div class='alert alert-danger' role='alert'>
                    E-mail ou senha inválidos.
                    </div>
                ";
        }
        mysqli_close($conexao);
    }
}
?>