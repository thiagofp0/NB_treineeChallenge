<?php

  //Aqui testa se o usuário está logado
  session_start();
  if (!isset($_SESSION['usuario'])){
	echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
  }

  //Recebe os valores do formulário de cadastro de pessoa

  $nmPessoa = $_POST['nmPessoa'];
  $cargo = $_POST['cargo'];
  $idGrupoAcesso = $_POST['idGrupoAcesso'];
  $email = $_POST['email'];

  //conecta com o banco

  include("conexao.php");

  if($conexao){

    //Dependedo do grupo de acesso, salva um valor específico no banco

    if($idGrupoAcesso === 1){
      $sql = "insert into tbPessoa (nmPessoa, cargo, idGrupoAcesso, email) values('$nmPessoa,$cargo, 1, $email');";
      $resultado = mysql_query($conexao, $sql);
      mysqli_close($conexao);
      if($resultado == 1){

        //Mensagem de sucesso ou erro ao cadastrar 
        
        echo "<script>alert('Registro salvo com sucesso!'); location.href='index.php';</script>"; 
      }else{
        echo "<script>alert('Erro ao salvar o registro'); location.href='pessoaFormulario.php';</script>"; 			
      }
    }else{

      //Mensagem de sucesso ou erro ao cadastrar
      
      $sql = "insert into tbPessoa (nmPessoa, cargo, idGrupoAcesso, email) values('$nmPessoa,$cargo, 2, $email');";
      $resultado = mysql_query($conexao, $sql);
      mysqli_close($conexao);
      if($resultado == 1){
        echo "<script>alert('Registro salvo com sucesso!'); location.href='index.php';</script>"; 
      }else{
        echo "<script>alert('Erro ao salvar o registro'); location.href='pessoaFormulario.php';</script>"; 			
      }
    }  
  }else{
		echo 'Falha ao conectar: '.mysqli_error();
	}
?>