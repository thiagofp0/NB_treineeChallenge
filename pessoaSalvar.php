<?php

  //Aqui testa se o usuário está logado
  session_start();
  if (!isset($_SESSION['usuario'])){
	echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
  }

  //Recebe os valores do formulário de cadastro de pessoa
  $idPessoa = $_POST['idPessoa'];
  $nmPessoa = $_POST['nmPessoa'];
  $cargo = $_POST['cargo'];
  //$idGrupoAcesso = $_POST['idGrupoAcesso'];
  $email = $_POST['email'];

  //conecta com o banco
  include("conexao.php");

  

  if($conexao){ //Se tiver conexão

    $v = true;

    if ($idPessoa == 0) { //Se for usuário novo

      //Descobre se o email é inédito no banco
      $sql = "SELECT * FROM tbPessoa;";	
      $resultado = mysqli_query($conexao, $sql);
      mysqli_close($conexao);
      foreach($resultado as $linha){	
        if($linha['email'] == $email){
          $v = false;
          echo "<script>alert('O e-mail já está cadastrado!'); location.href='pessoaFormulario.php';</script>"; 
        }
      }
      // Fim da consulta sobre e-mail
      //Se o email for inédito, salva o novo usuário
      if($v == true){
        include("conexao.php");
        $sql = "insert into tbPessoa (nmPessoa, cargo, email) values('$nmPessoa','$cargo', '$email');";
        $resultado = mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        // Confere se salvou no banco
        if($resultado == 1){
          echo "<script>alert('Registro salvo com sucesso !!!'); location.href='pessoaTabela.php';</script>"; 
        }else{
          echo "<script>alert('Erro ao salvar o registro'); location.href='pessoaFormulario.php';</script>";		
        }
      }

    }else{ // Se não for usuário novo

      $sql = "UPDATE tbPessoa SET nmPessoa='$nmPessoa', email='$email', cargo='$cargo' WHERE idPessoa = '$idPessoa';";   
      $resultado = mysqli_query($conexao, $sql);
      mysqli_close($conexao);
      if($resultado == 1){
        echo "<script>alert('Registro salvo com sucesso !!!'); location.href='pessoaTabela.php';</script>"; 
      }else{
        echo "<script>alert('Erro ao salvar o registro'); location.href='pessoaFormulario.php';</script>";		
      }

    }

	}else{ //Se não tiver conexão
		echo 'Falha ao conectar: '.mysqli_error();
	}
?>