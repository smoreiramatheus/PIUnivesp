<?php
require_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Solicitações</title>

    <!-- Link de estilização BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/521a3c16fd.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    require_once('menu.php');
    ?>
    <!-- CONTEÚDO CENTRAL-->
    <div class="container text-center conteudo">


        <div class="mt-5">
            <p class="h2 text-center">Consultar Solicitações</p>
        </div>

        <div class="mt-5">
            <p class="font-weight-bold"> Nova Solicitação
                <button type="button" class="btn btn-warning btn-sm ml-2" href="solicitacao.php">Solicitante Cadastrado</button>
                <button type="button" class="btn btn-secondary btn-sm" href="cadastroSolic.php">Cadastrar Solicitante</button>
            </p>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <table class="table table-sm table-hover w-75">
                <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Status</th>
                        <th scope="col">Recurso</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Nome do Solicitante</th>
                        <th scope="col">Bairro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($_POST["botaoBuscar"])) {
                        $textoBusca = $_POST["busca"];
                        $sql = "select * from solicitacao where cpf_solicitante like '%$textoBusca%' or nome_solicitante like '%$textoBusca%' or data_solicitacao like '%$textoBusca%' or recurso_solicitacao like '%$textoBusca%' or qtd_recurso like '%$textoBusca%' order by data_solicitacao";
                    } else {
                        $sql = "select * from solicitacao";
                    }
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($rows = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <th><?php echo $rows["data_solicitacao"]; ?></th>
                                <td><?php echo $rows["status_solicitacao"]; ?></td>
                                <td><?php echo $rows["recurso_solicitacao"]; ?></td>
                                <td><?php echo $rows["qtd_recurso"]; ?></td>
                                <td><?php echo $rows["cpf_solicitante"]; ?></td>
                                <td><?php echo $rows["nome_solicitante"]; ?></td>
                                <td><?php echo $rows["bairro_solicitante"]; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<div class='alert alert-danger text-white' role='alert'>
                        Não existe solicitação para o termo buscado. Tente novamente!
                        </div>";
                    }

    ?>
                </tbody>
            </table>


        </div>

    </div>
    <div class="" id="footer-espacado">
        <?php
        require_once('footer.php');
        ?>
    </div>

</body>

</html>