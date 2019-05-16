<?php
    //Funcionando Corretamente
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
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/atividadesFormulario.css" />
	</head>


	<body>
		<section id="main">
			<div class="inner">
				<section id="one" class="wrapper style1" align="cente">
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
						<form action="atividadeSalvar.php" method="post">
							<p>Nome da atividade:</p><input type="text" name="desAtividade"><br>
							<p>Pontos da atividade:</p><input type="text" name="pontos"><br>
							<input type="submit" name="adicionarAtividade" value="Adicionar">
						</form>
					</div>
				</section>
			</div>
		</section>

			

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					
				</div>
				
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>