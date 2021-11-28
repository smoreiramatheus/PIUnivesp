<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Cadastro de Solicitante</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/521a3c16fd.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  require_once('menu.php');
  ?>

  <div class="mt-5 container mb-5">
  <h5 class="mt-3"> Cadastro de Solicitante</h5>

    <form method="post" action="cadastroSolic.php" name="formulario" id="form-cadastro" class="mt-3">
      <div class="form-group">
        <label for="inputAddress">Nome Completo</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Fulano de Beltrano" name="nome_solic" required>
      </div>
      <div class="form-group">
        <label for="inputAddress">E-mail</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Fulano de Beltrano" name="email_solic" required>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">RG</label>
          <input type="text" class="form-control" id="inputEmail4" placeholder="xxxxxxxxx" name="rg_solic" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">CPF</label>
          <input type="text" class="form-control" id="inputPassword4" placeholder="XXXXXXXXXXX" name="cpf_solic" required>
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress2">Dependentes</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Fulano, Beltrano e Cicrano." name="obs_solic" required>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Telefone</label>
          <input type="text" class="form-control" id="inputEmail4" placeholder="(xx)xxxxx-xxxx" name="tel_solic" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Endereço</label>
          <input type="text" class="form-control" id="inputPassword4" placeholder="XXXXXXXXXXX" name="end_solic" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputDistrict">Bairro</label>
          <input type="text" class="form-control" id="inputDistrict" name="bairro_solic" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputCity">Cidade</label>
          <input type="text" class="form-control" id="inputCity" name="cidade_solic" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEstado">Estado</label>
          <input id="inputEstado" class="form-control" name="estado_solic" required>
          
        </div>
        <div class="form-group col-md-6   ">
          <label for="inputCEP">CEP</label>
          <input type="text" class="form-control" id="inputCEP" name="cep_solic" required>
        </div>
      </div>

      <button type="submit" class="btn btn-warning mb-4" name="botaoCadastrar">Cadastrar</button>

      <?php
      if (isset($_POST["botaoCadastrar"])) cadastrarSolic();
      ?>

    </form>

  </div>
  <div class="">
    <?php
    require_once('footer.php');
    ?>
  </div>
</body>

</html>


<?php
function cadastrarSolic()
{
  $nome = $_POST["nome_solic"];
  $rg = $_POST["rg_solic"];
  $cpf = $_POST["cpf_solic"];
  $obs = $_POST["obs_solic"];
  $tel = $_POST["tel_solic"];
  $end = $_POST["end_solic"];
  $bairro = $_POST["bairro_solic"];
  $cidade = $_POST["cidade_solic"];
  $estado = $_POST["estado_solic"];
  $cep = $_POST["cep_solic"];
  $email = $_POST["email_solic"];

  $conexao = new mysqli("sql202.epizy.com", "epiz_30448384", "edlfti6uRBg", "epiz_30448384_db_projeto");

  $sql = "insert into solicitante (nome_solic, rg_solic, cpf_solic, obs_solic, tel_solic, end_solic, bairro_solic, cidade_solic, cep_solic, uf_solic, email_solic)
                          values ('$nome', '$rg', '$cpf', '$obs', '$tel', '$end', '$bairro', '$cidade', '$cep', '$estado', '$email')";

  if (mysqli_query($conexao, $sql)) {
    echo "<br><br><div class='alert alert-success' role='alert'>Cadastro efetuado com sucesso!</div>";
  };

  mysqli_close($conexao);
};
?>