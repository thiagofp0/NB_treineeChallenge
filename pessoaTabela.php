<?php
//Falta fazer.
//Só tem autenticação de usuário
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
                    <li><a href="#" alignment="center"><strong>RANKING</strong></a>
                    <!-- <ul class="submenu">
                    <li><a href="geral.php"><strong>GERAL</strong></a>
                    <li><a href="mensal.php"><strong>MENSAL</strong></a>
                    <li><a href="semanal.php"><strong>SEMANAL</strong></a>
                    </ul> -->
                    <li><a href="login-php/index.php"><strong>LOGIN</strong></a></li>
                </ul>
            </nav>
        </section>

        <table>
			<tr>
                <td><strong>Nome</strong></td>
                <td><strong>Cargo</strong></td>
                <td><strong>Email</strong></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tbody>
                <?php
                    include ("conexao.php");
                    if($conexao) {
                        $sql = "SELECT * from tbPessoa;";		
                        $resultado = mysqli_query($conexao, $sql);
                        $row = mysqli_num_rows($resultado);
                        mysqli_close($conexao);
                        if($row > 0){
                            foreach($resultado as $linha){		
                                echo"<tr>";			
                                    echo"<td>".$linha['nmPessoa']."</td>";
                                    echo"<td>".$linha['cargo']."</td>";
                                    echo"<td>".$linha['email']."</td>";
                                    echo"<td> <a class='btn btn-success' href='pessoaFormulario.php?idPessoa=".$linha['idPessoa']."'> Editar </a> </td>";
                                    echo"<td> <a class='btn btn-danger'  href='pessoaDetalhes.php?idPessoa=".$linha['idPessoa']."'> Detalhes </a> </td>";
                                    echo"<td> <a class='btn btn-danger'  href='pessoaExcluir.php?idPessoa=".$linha['idPessoa']."'> Excluir </a> </td>";													
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