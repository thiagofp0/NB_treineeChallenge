<?php

include('conexao.php');
$query = "SELECT nome,pontos FROM `pontos` ORDER BY pontos DESC";
$result = mysqli_query($conexao,$query);
?>


<!DOCTYPE HTML>
<!--
	Caminar by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Ranking No Bugs</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

	<style>

*{
	margin:0;
	padding:0;
	color:black;
	font-family:'Pixel-Art Regular';
	}
	
.menu{
	width:100%;
	height:50px;
	background-color: white;
	}
	
.menu>ul{
	list-style:none;	
	position:auto;
	margin-left:auto;
	}
.menu ul li{
		width:150px;
		float:left;
	}

.menu a{
	padding:15px;
	display:block;
	text-decoration: none;
	background-color: white;
	text-align:center;
	}
.menu ul ul{
	list-style:none;
	position:absolute;
	visibility:hidden;
	
	}
.menu ul li:hover ul{
	visibility:visible;
	}
	
.menu a:hover{
	background-color:white;
	}

.menu ul ul li{
	float:none;
	border-bottom: solid 1px #ccc;
	}
.menu ul ul li a{
	background-color:#87CEEB;
	}
#bt_menu{
	display: none;
	}
label[for='bt_menu']{
	padding:5px;
	background-color:white;
	color:white;
	font-family:'PixelArt';
	text-align:center;
	font-size:30px;
	cursor:pointer;
	display:none;
	width:50px;
	height:50px;
	}	
label[for='bt_menu']:hover{
	background-color:white;
	color:white;
	}
@media (max-width: 800px) {
.menu{
	margin-left:-100%;
	transition:all .4s;
	}
label[for='bt_menu']{
	display:block;
	}
.menu>ul{
	margin-left:0;
	}
.menu{
	margin-top:5px;
	}
.menu ul li{
	width:100%;
	float:none;
	}
.menu ul ul{
	position:static;
	overflow:hidden;
	max-height:0;
	transition:all .4s;
	}
.menu ul li:hover ul{
	height:auto;
	max-height:200px;
	transition:all .4s;
	}
#bt_menu:checked ~ .menu{
	margin-left:0;
	}
}


	</style>









	<body>

		<!-- Header -->
			

		<!-- Main -->
			<section id="main">
				<div class="inner">

				<!-- One -->
					<section id="one" class="wrapper style1" align="cente">
						<header id="cabecalho">
							<nav class="menu">
	<ul>
    	<li><a href="#"><strong>Ranking</stron></a>
        	<ul class="submenu">
            	<li><a href="geral.php"><strong>Geral</strong></a>
                <li><a href="mensal.php"><strong>Mensal</strong></a>
                <li><a href="semanal.php"><strong>Semanal</strong></a>
            </ul>
      
        <li><a href="login-php/index.php"><strong>Login</strong></a></li>
    </ul>
</nav>

		</header>	
					</section>

				<!-- Two -->
					
				<!-- Three -->
				<header class="special">
						<div align="center">
							<img src="images/logo1.png" width="700" ><br><br>
						</div>
						<div><font color="black">
							<table align="center" style="font-family: Pixel-Art Regular">
								<strong>
								<tr align="center">
									<td>Colocação</td>
									<td>Nome</td>
									<td>Pontos</td>
								</tr>
								<?php
								$cont = 1;
									while($row = mysqli_fetch_assoc($result)){
								?>
								<tr align="center">
									<td><?php echo $cont ?>°</td>
									<td><a href="detalhes.php"><?php echo $row['nome'] ?></a></td>
									<td><?php echo $row['pontos'] ?></td>
								</tr>
							</strong>
								<?php
										$cont++;
									}
								?>
								
							</table>
							</font>
						</div>
							<br><br><br><br>
							
					</div>
			</section>

			

		<!-- Footer -->
			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>