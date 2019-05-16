<?php
    //Falta descobrir como mandar o código via post para o arquivo que salva
    //Aqui testa se o usuário está logado
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
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="css/cadastrarPontuacao.css" />
	</head>

	<body>
		<section id="main">
			<div class="inner">
				<section id="one" class="wrapper style1" align="center">
					<header id="cabecalho">
						<nav class="menu">
							<ul>
    							<li><a href="#"><strong>Pontos</stron></a>
        							<ul class="submenu">
            							<li><a href="lancarPontos.php"><strong>Lançar</strong></a>
                						<li><a href="atualizar.php"><strong>Atualizar</strong></a>
            						</ul>
        						<li><a href="">Cadastrar</a>
        							<ul class="submenu">
        								<li><a href="cadastrar.php">Usuario</a></li>
        								<li><a href="atividades.php">Atividade</a></li>
        							</ul>
        						</li>
								<li><a href="logout.php"><strong>Logout</strong></a></li>
    						</ul>
						</nav>

					</header>	
				</section>
				<!-- One -->
				<section id="one" class="wrapper style1">

					<div class="content">
						<form action="adicionarPessoaAtividade.php" method="POST">
                        <p>Nome:</p>
						<select id="idPessoa" name="idPessoa" class="form-control" required>
								<?php
									include("conexao.php");
									if($conexao) {
										$sql = "SELECT * FROM tbPessoa;";		
										$resultado = mysqli_query($conexao, $sql);
										mysqli_close($conexao);
										echo "<option value=''disabled selected >Selecione uma pessoa</option>";
										foreach($resultado as $linha){	
											echo "<option value='".$linha['idPessoa']."'>".$linha['nmPessoa']."</option>";			
										}
									}else{
										echo 'Falha ao conectar: '.mysqli_error();
									}	
								?>
							</select>
							<br><br>
                            <p>Atividade:</p>
                            <select id="idAtividade" name="idAtividade" class="form-control" required>
								<?php
									include("conexao.php");
									if($conexao) {
										$sql = "SELECT * FROM tbAtividade;";		
										$resultado = mysqli_query($conexao, $sql);
										mysqli_close($conexao);
										echo "<option value=''disabled selected >Selecione uma atividade</option>";
										foreach($resultado as $linha){	
											echo "<option value='".$linha['idAtividade']."'>".$linha['desAtividade']."</option>";			
										}
									}else{
										echo 'Falha ao conectar: '.mysqli_error();
									}	
								?>
							</select>
                            <br><br>
							<input type="submit" name="adicionarAtividade">
							<br><br><br><br><br>
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
<select id="idAtividade" name="idAtividade" class="form-control" required>
	<?php
		include("conexao.php");
		if($conexao) {
			$sql = "SELECT * FROM tbAtividade;";		
			$resultado = mysqli_query($conexao, $sql);
			mysqli_close($conexao);
			echo "<option value='' disabled selected>Selecione um grupo de acesso</option>";
			foreach($resultado as $linha){		   			
				echo "<option selected value='".$linha['idAtividade']."'>".$linha['desAtividade']."</option>";
			}
		}else{
			echo 'Falha ao conectar: '.mysqli_error();
		}	
	?>
</select>
<?php
	
?>
