<?php
//Ainda tem que fazer. Só em a autenticação do usuário
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
        <link rel="stylesheet" href="css/pessoa.css">
	</head>

	<body>

<section id="main">
	<div class="inner">
		<section id="one" class="wrapper style1" alignment="cente">
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
        </section>

        <table>
			<tr>
                <td><strong>Nome da Atividade</strong></td>
                <td><strong>Pontos</strong></td>
                <td></td>
                <td></td>
            </tr>
            <tbody>
                <?php
                    include ("conexao.php");
                    if($conexao) {
                        $sql = "SELECT * from tbAtividade;";		
                        $resultado = mysqli_query($conexao, $sql);
                        $row = mysqli_num_rows($resultado);
                        mysqli_close($conexao);
                        if($row > 0){
                            foreach($resultado as $linha){		
                                echo"<tr>";			
                                echo"<td>".$linha['desAtividade']."</td>";
                                echo"<td>".$linha['pontos']."</td>";
                                echo"<td> <a class='btn btn-success' href='atividadesFormulario.php?idAtividade=".$linha['idAtividade']."'> Editar </a> </td>";
								echo"<td> <a class='btn btn-danger'  href='atividadeExcluir.php?idAtividade=".$linha['idAtividade']."'> Excluir </a> </td>";							
                                echo"</tr>";					
                            }
                        }
                    }else{
                        echo 'Falha ao conectar: '.mysqli_error();
                    }
                ?>
            </tbody>
        </table>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>