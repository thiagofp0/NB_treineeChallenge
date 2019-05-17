<?php
    session_start();
    if (!isset($_SESSION['usuario'])){
      echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
    }

    $idPessoa = $_GET['idPessoa'];

    include("conexao.php");

    if($conexao){
        $sql = "DELETE FROM tbPessoa WHERE idPessoa = '$idPessoa';";
        $resultado = mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        if($resultado == 1){
			echo "<script>alert('Usuário excluído com sucesso!'); location.href='pessoaTabela.php';</script>"; 
		}else{
			echo "<script>alert('Erro ao excluir o usuário'); location.href='pessoaTabela.php';</script>"; 			
		}
    }else{
        echo 'Falha ao conectar: '.mysqli_error();
    }
?>