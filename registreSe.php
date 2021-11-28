<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/521a3c16fd.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <!-- INÍCIO MENU SOBRE -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><img src="assets/logo.png" class="img-fluid" alt="Imagem responsiva"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login Administrador</a>
      </li>
    </ul>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- FIM MENU SOBRE -->

    <div>


        <h5 class=" d-flex justify-content-center mt-5"> Cadastro de Usuário</h5>
        <div class="container">

        
            <form method="post" action="cadastroUsua.php" name="formulario" id="form-cadastro">
                <div class="form-row mt-3 justify-content-center">
                    <div class="form-group col-8">
                        <label for="inputAddress">Nome Completo</label>
                        <input type="text" name="nome" class="form-control" id="inputName" placeholder="Fulano de Beltrano">
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-4">
                        <label for="inputEmail4">Registro do funcionário</label>
                        <input type="text" name="registro" class="form-control" id="inputRg" placeholder="123456">
                    </div>
                    <div class="form-group col-4">
                        <label for="inputPassword4">E-mail</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="exemplo@gmail.com">
                    </div>
                </div>


                <div class="form-row justify-content-center">
                    <div class="form-group col-4">
                        <label for="inputEmail4"> Senha</label>
                        <input type="password" name="senha" class="form-control" id="inputPass" placeholder="">
                    </div>
                    <div class="form-group col-4">
                        <label for="inputPassword4">Confirmar Senha</label>
                        <input type="password" name="senha2" class="form-control" id="inputPass2" placeholder="">
                    </div>
                </div>


                <div class="row justify-content-center">
                    <div class="col-8">
                        <a type="button" class="btn btn-outline-dark mb-4" href="./index.php">Cancelar</a>
                        <button type="submit" name="botaoCadastrar" class="btn btn-warning mb-4 ml-2">Cadastrar</button>
                        
                        <?php
                        if (isset($_POST["botaoCadastrar"])) inserir();

                        ?>


                    </div>


                </div>


            </form>

        </div>
        <div class="fixed-bottom">
            <?php
            require_once('footer.php');
            ?>
        </div>

    </div>
</body>

</html>

<?php
function inserir()
{
    $registro = $_POST["registro"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5("senha");
   $conexao = new mysqli("sql202.epizy.com", "epiz_30448384", "edlfti6uRBg", "epiz_30448384_db_projeto");

    $sql = "insert into administrador(reg_admin, nome_admin, email_admin, senha)
            values ('$registro', '$nome', '$email', '$senha')";

    if (mysqli_query($conexao, $sql)) {
        echo "<br><br><div class='alert alert-success' role='alert'>Cadastro efetuado com sucesso!</div>";
    };

    mysqli_close($conexao);
};

?>

<?php
/*function inserir()
{
    $registro = $_POST["registro"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $conexao = new mysqli("localhost", "root", "", "db_projeto");

    $sql = "insert into administrador(reg_admin, nome_admin, email_admin, senha)
            values ('$registro', '$nome', '$email', '$senha')";

    if (mysqli_query($conexao, $sql)) {
        echo "<br><br><div class='alert alert-success' role='alert'>Cadastro efetuado com sucesso!</div>";
    }
    if (!mysqli_query($conexao, $sql)) {
        echo("falhou");
    };
    
    mysqli_close($conexao);
}; */
?>
