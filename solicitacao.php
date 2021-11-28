<?php
require_once('conn.php');
?>

<?php
require_once('cabecalho.php');
?>

<body>
    <?php
    require_once('menu.php');
    ?>

    <h5 class="container mt-5 mb-5"> Solicitação de Recurso</h5>
    <div class="container">

        <form method="post" action="solicitacao.php" name="formulario" id="form-cadastro" id="formulario">


            <div class="form-group" method="post" action="solicitacao.php" name="formulario" id="form-cadastro">
                <label for="inputAddress">CPF do Solicitante:</label>
                <input type="text" class="form-control col-md-8 " id="inputAddress" placeholder="ABC1234" name="cpf_solic">
                <br>
                <button type="submit" class="btn btn-outline-dark mr-3" name="botaoBuscar">Buscar</button>

                <?php
                if (isset($_POST["botaoBuscar"])) buscarSolic();
                ?>
            </div>

            <?php

            function buscarSolic()

            {
                $servername = "sql202.epizy.com";
                $username = "epiz_30448384";
                $password = "edlfti6uRBg";
                $database = "epiz_30448384_db_projeto";
                $conexao = mysqli_connect($servername, $username, $password, $database);

                $cpf = $_POST["cpf_solic"];

                $sql = "select * from solicitante where cpf_solic='$cpf'";

                $resultado = $conexao->query($sql);

                if (!empty($resultado) && $resultado->num_rows > 0) {

                    while ($rows = $resultado->fetch_assoc()) {
                        $cpf = $rows["cpf_solic"];
            ?>
                        <h5 class="mt-4">Nova Solicitação</h5>
                        <div class="form-row mt-3">
                            <div class="form-group col-md-2" method="post" action="solicitacao.php" name="formulario" id="form-cadastro">
                                <label for="inputAddress">Nome:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Fulano" name="nome_solicitante" value="<?php echo $rows['nome_solic']; ?> " readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress">CPF:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="CPF" name="cpf_solicitante" value="<?php echo $rows['cpf_solic']; ?> " readonly>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputAddress">Bairro:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Bairro" name="bairro_solicitante" value="<?php echo $rows['bairro_solic']; ?> " readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress">Cidade:</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Cidade" name="cidade_solicitante" value="<?php echo $rows['cidade_solic']; ?> " readonly>
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group col-md-2">
                                <label for="inputCity">Recurso:</label>
                                <select class="form-control" id="formSelect" name="recurso_solicitacao" required>
                                    <option>Cesta Básica</option>
                                    <option>Alimento avulso</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCity">Status:</label>
                                <select class="form-control" id="formSelect" name="status_solicitacao" required>
                                    <option>Solicitado</option>
                                    <option>Aguardando Retirada</option>
                                    <option>Retirado</option>
                                    <option>Recusado</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputCEP">Quantidade:</label>
                                <input type="number" class="form-control" id="inputCEP" placeholder="" name="qtd_recurso" required>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="inputData">Data da Solicitação:</label>
                                <input id="date" type="date" class="form-control" name="data_solicitacao" required>
                            </div>

                        </div>

    </div>
    
    <a type="button" class="btn btn-outline-dark mr-3" href="./index.php">Cancelar Solicitação</a>

    <button type="submit" class="btn btn-warning" name="botaoGerar">Gerar Solicitação</button>
<?php

                    }
                } else {
                    echo "<br> <br> 
                    <div class='alert alert-danger' role='alert'>
                    Não há cadastro para o CPF informado. Tente novamente!
                    </div>";
                }
            };
?>

<?php
if (isset($_POST["botaoGerar"])) gerarSolic();
?>

</form>

</div>
<div id="footer-espacado">
    <?php
    require_once('footer.php');
    ?>
</div>

</body>

</html>

<?php
function gerarSolic()
{
    $cpf = $_POST["cpf_solicitante"];
    $status = $_POST["status_solicitacao"];
    $nome = $_POST["nome_solicitante"];
    $recurso = $_POST["recurso_solicitacao"];
    $quantidade = $_POST["qtd_recurso"];
    $data = $_POST["data_solicitacao"];
    $bairro = $_POST["bairro_solicitante"];
    $cidade = $_POST["cidade_solicitante"];

    $conn = mysqli_connect($servername, $username, $password, $database);

    $sql = "insert into solicitacao (cpf_solicitante, nome_solicitante, recurso_solicitacao, qtd_recurso, data_solicitacao, bairro_solicitante, cidade_solicitante, status_solicitacao)
                            values ('$cpf', '$nome', '$recurso', '$quantidade', '$data', '$bairro', '$cidade', '$status')";

    if (mysqli_query($conexao, $sql)) {
        echo "<br><br><div class='alert alert-success' role='alert'>Solicitação cadastrada com sucesso!</div>";
    };

    mysqli_close($conexao);
}


?>