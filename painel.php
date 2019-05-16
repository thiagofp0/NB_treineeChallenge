<?php
//Funcionando parcialmente. Falta acertar os links
    session_start();
    if (!isset($_SESSION['usuario'])){
    echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
}
        
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Ranking No Bugs</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/painel.css" />
    </head>
    
	<body>
		<section id="main">
			<div class="inner">
				<section id="one" class="wrapper style1" align="cente">
					<header id="cabecalho">
						<nav class="menu">
							<ul>
    							<li><a href="#"><strong>Tabelas</stron></a>
        							<ul class="submenu">
                                        <!-- <li><a href="lancarPontos.php"><strong>Lançar</strong></a> -->
                                        <li><a href="cadastrarPontuacao.php"><strong>Tabela Pessoas</strong></a>
										<li><a href="cadastrarPontuacao.php"><strong>Tabela Atividades</strong></a>
            						</ul>
        						<li><a href="">Cadastrar</a>
        							<ul class="submenu">
									<li><a href="cadastrarPontuacao.php">Lancar Pontos</a></li>
        								<li><a href="cadastrar.php">Cadastrar Pessoa</a></li>
        								<li><a href="atividadesFormulario.php">Cadastrar Atividade</a></li>
        							</ul>
        						</li>
								<li><a href="logout.php"><strong>Logout</strong></a></li>
    						</ul>
						</nav>

					</header>	
				</section>
				<!-- One -->
				<section id="one" class="wrapper style1">

                <?php
                $usuario = $_SESSION['usuario'];
			    echo "<h3 align='center'>Olá, ". $usuario ."!</h3>";
		        ?>

					<div class="content">
						<table>
							<tr>
								<td>Colocação</td>
								<td>Nome</td>
								<td>Pontos</td>
                            </tr>
                            <tbody>
                        <?php
                            include ("conexao.php");
                            if($conexao) {
                                $sql = "SELECT nmpessoa as Nome, sum(pontos) as Pontos FROM tbPessoa p INNER JOIN tbPessoaAtividade pa inner join tbatividade a on p.idPessoa = pa.idPessoa and pa.idatividade = a.idatividade group by nmpessoa order by sum(pontos) DESC;";		
                                $resultado = mysqli_query($conexao, $sql);
                                $row = mysqli_num_rows($resultado);

                                mysqli_close($conexao);
                                if($row > 0){
                                    $cont = 1;
                                    foreach($resultado as $linha){		
                                        echo"<tr>";			
                                        echo"<td>".$cont."</td>";
                                        $cont++;
                                        echo"<td>".$linha['Nome']."</td>";
                                        echo"<td>".$linha['Pontos']."</td>";								
                                        echo"</tr>";					
                                    }
                                }
                            }else{
                                echo 'Falha ao conectar: '.mysqli_error();
                            }
					    ?>
                            </tbody>
						</table>
					</div>
				</section>
			</div>
		</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>