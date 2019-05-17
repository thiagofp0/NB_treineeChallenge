<?php
    session_start();
    if (!isset($_SESSION['usuario'])){
      echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
    }

    $idAtividade = $_GET['idAtividade'];

    include("conexao.php");

    if($conexao){
      $sql = "DELETE FROM tbAtividade WHERE idAtividade = '$idAtividade';";
      $resultado = mysqli_query($conexao, $sql);
      mysqli_close($conexao);
      if($resultado == 1){
			echo "<script>alert('Registro excluído com sucesso!'); location.href='atividadesTabela.php';</script>"; 
		}else{
			echo "<script>alert('Erro ao excluir o registro'); location.href='atividadesTabela.php';</script>"; 			
	  }
  }else{
        echo 'Falha ao conectar: '.mysqli_error();
  }
?>