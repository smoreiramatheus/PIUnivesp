<?php
$servername = "sql202.epizy.com";
$username = "epiz_30448384";
$password = "edlfti6uRBg";
$database = "epiz_30448384_db_projeto";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("A conexão falhou: " . mysqli_connect_error());
}
?>