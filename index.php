      <?php
          //Funcionando corretamente!!!
      ?>
      <!-- Essa página é pra qualquer um poder ver o ranking, mesmo sem logar -->
<!DOCTYPE HTML>

<html>
	<head>
		<title>Ranking No Bugs</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/painel.css" />
	</head>

	<style>
img{
	max-width:100%;
	height:auto;
}
</style>

<body>
	<section id="main">
			<div class="inner">
					<div class="content">
                    <div align="center">
							<img src="images/logo1.png" width="700" ><br><br>
					</div>
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
			<div align="center">
				<a href="login.php">
					<img src="images/fazerlogin.png" width="250">
				</a>
			</div>
		</section>
			

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.poptrox.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<script src="js/main.js"></script>

	</body>
</html>