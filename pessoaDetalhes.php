<?php

include('conexao.php');
$idPessoa = $_GET['idPessoa'];
$query = "Select * from tbPessoa where idPessoa = '$idPessoa';";
$resultado = mysqli_query($conexao,$query);
mysqli_close($conexao);
foreach ($resultado as $linha) {
    $idPessoa = $linha['idPessoa'];
    $nmPessoa = $linha['nmPessoa'];
    $totalPontos = 0;
    $TotalAtividades = 0;
}
?>


<!DOCTYPE HTML>

<html>

<head>
    <title>Ranking No Bugs</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/pessoa.css" />>
</head>

<body>

    <section id="main">
        <div class="inner">

            <!-- One -->
            <section id="one" class="wrapper style1" align="cente">
                <header id="cabecalho">
                <nav class="menu">
							<ul>
    							<li><a href="#"><strong>Tabelas</strong></a>
        							<ul class="submenu">
                                        <!-- <li><a href="lancarPontos.php"><strong>Lançar</strong></a> -->
                                        <li><a href="pessoaTabela.php">Tabela Pessoas</a>
										<li><a href="atividadesTabela.php">Tabela Atividades</a>
            						</ul>
        						<li><a href=""><strong>Cadastrar</strong></a>
        							<ul class="submenu">
									<li><a href="cadastrarPontuacao.php">Lancar Pontos</a></li>
        								<li><a href="pessoaFormulario.php">Cadastrar Pessoa</a></li>
        								<li><a href="atividadesFormulario.php">Cadastrar Atividade</a></li>
        							</ul>
        						</li>
                                <li><a href="painel.php"><strong>Painel Adm</strong></a></li>
								<li><a href="logout.php"><strong>Logout</strong></a></li>
    						</ul>
						</nav>

                </header>
            </section>

            <header class="special">
                <div>
                    <h3 align="center">Detalhes de <?php echo $nmPessoa ?></h3>
                </div>
                <div>
                    <font color="black">
                        <table align="center" style="font-family: Mario Kart regular">
                            <strong>
                                <tr align="center">
                                    <td>Atividade</td>
                                    <td>Pontos</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tbody>
                                    <?php
                                        include("conexao.php");
                                        if ($conexao) {
                                            $sql = "Select * from tbAtividade a inner join tbPessoaAtividade pa on a.idAtividade = pa.idAtividade where pa.idPessoa = '$idPessoa'; ";
                                            $resultado = mysqli_query($conexao, $sql);
                                            $row = mysqli_num_rows($resultado);
                                            mysqli_close($conexao);
                                            if ($row > 0) {
                                                foreach ($resultado as $linha) {
                                                    echo "<tr>";
                                                        echo"<td align='center' type='hidden'>".$linha['idAtividade']."</td>";
                                                        $idAtividade = $linha['idAtividade'];
                                                        echo"<td align='center'>".$linha['desAtividade']."</td>";
                                                        echo"<td align='center'>".$linha['pontos']."</td>";
                                                        $totalPontos = $totalPontos + $linha['pontos'];
                                                        $TotalAtividades++;
                                                        echo"<td> <a class='btn btn-danger'  href='removerPessoaAtividade.php?idPessoa=".$idPessoa."&idAtividade=".$idAtividade."'> Excluir </a> </td>";
                                                    echo"</tr>";
                                                }
                                            }
                                        }
                                    ?>
                                </tbody>
                                <br>
                                <td color="blue" align="center">
                                    Total de Atividades:
                                    <?php echo $TotalAtividades;?>
                                </td>
                                <td align="center">Total de pontos
                                <?php echo $totalPontos;?>
                                </td>
                                <td></td>
                                <td></td>
                                </tr>
                        </table>
                    </font>
                </div>
                <br><br><br><br>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.poptrox.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>