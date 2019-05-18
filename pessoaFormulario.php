<?php
//Falta fazer. 
//Só tem autenticação de usuário
    session_start();
    if (!isset($_SESSION['usuario'])){
    echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
}
$idPessoa = 0;
$nmPessoa ="";
$cargo = "";
$email = "";
if(isset($_GET["idPessoa"])){
		
    $idPessoa = $_GET["idPessoa"];;
    include("conexao.php");
    if($conexao) { 
        $sql = "SELECT * FROM tbPessoa WHERE idPessoa = '$idPessoa';";		
        
        $resultado = mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        
        foreach($resultado as $linha) {
			$idPessoa = $linha['idPessoa'];
			$nmPessoa = $linha['nmPessoa'];
            $email = $linha['email'];
            $cargo = $linha['cargo'];
        }
        
    }else{
        echo 'Falha ao conectar: '.mysqli_error();
    }
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

					</header>	
				</section>
				<!-- One -->
				<section id="one" class="wrapper style1">
					<div class="content">
						<form action="pessoaSalvar.php" method="post">
                            <input type="hidden" name="idPessoa" id="idPessoa" value="<?php echo $idPessoa ?>" >
							<p>Nome:</p><input type="text" name="nmPessoa" width="10" value="<?php echo $nmPessoa ?>" required><br>
							<p>Cargo:</p><input type="text" name="cargo" width="10" value="<?php echo $cargo ?>" required><br>
							<p>Email:</p><input type="text" name="email" width="10" value="<?php echo $email ?>" required><br>
							<input type="submit" name="botao" value="Adicionar"><br>
						</form>
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