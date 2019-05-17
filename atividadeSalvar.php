<?php

  //Aqui testa se o usuário está logado
  session_start();
  if (!isset($_SESSION['usuario'])){
	echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
  }

  //Recebe os valores do formulário de cadastro de pessoa
  $idAtividade = $_POST['idAtividade'];
  $desAtividade = $_POST['desAtividade'];
  $pontos = $_POST['pontos'];

  //conecta com o banco

  include("conexao.php");
  

  if($conexao){ //Se tiver conexão
    if ($idAtividade == 0) {
      include("conexao.php");
      $sql = "INSERT INTO tbAtividade (desAtividade, pontos) values('$desAtividade', '$pontos');";
      $resultado = mysqli_query($conexao, $sql);

      mysqli_close($conexao);

      if($resultado == 1){
        echo "<script>alert('f salvo com sucesso!'); location.href='atividadesTabela.php';</script>"; 
      }else{
        echo "<script>alert('Erro ao salvar o registro'); location.href='atividadesFormulario.php';</script>"; 			
      }
    }else{

      $sql = "UPDATE tbAtividade SET desAtividade='$desAtividade', pontos='$pontos' WHERE idAtividade = '$idAtividade';";   
      $resultado = mysqli_query($conexao, $sql);
      mysqli_close($conexao);
      if($resultado == 1){
        echo "<script>alert('Registro salvo com sucesso !!!'); location.href='atividadesTabela.php';</script>"; 
        //echo "<script>negado();</script>";
      }else{
        echo "<script>alert('Erro ao salvar o registro'); location.href='atividadesFormulario.php';</script>";		
      }

    }

	}else{ //Se não tiver conexão
		echo 'Falha ao conectar: '.mysqli_error();
	} 


?>