<?php
    session_start();
    if (!isset($_SESSION['usuario'])){
      echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
    }

    $idAtividade = $_POST['idAtividade'];

    include("conexao.php");

    if($conexao){

        $sql = "DELETE FROM tbatividade WHERE idAtividade = '$idAtividade';";
        $result = mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        if($resultado == 1){
			echo "<script>alert('Registro excluído com sucesso!'); location.href='atividadeTabela.php';</script>"; 
		}else{
			echo "<script>alert('Erro ao excluir o registro'); location.href='atividadeTabela.php';</script>"; 			
		}
    }else{
        echo 'Falha ao conectar: '.mysqli_error();
    }
?>