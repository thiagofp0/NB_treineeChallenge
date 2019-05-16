<?php
    //Funcionando Corretamente
    //Aqui testa se o usuário está logado
  session_start();
  if (!isset($_SESSION['usuario'])){
	echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
  }

  //Recebe os valores do formulário de cadastro de atividade
  $desAtividade = $_POST['desAtividade'];
  $pontos = $_POST['pontos'];

  //conecta com o banco

  include("conexao.php");

  if($conexao){

    $sql = "INSERT INTO tbAtividade (desAtividade, pontos) values('$desAtividade', '$pontos');";
    $resultado = mysqli_query($conexao, $sql);

    mysqli_close($conexao);

    if($resultado == 1){
        echo "<script>alert('Registro salvo com sucesso!'); location.href='atividadeTabela.php';</script>"; 
    }else{
        echo "<script>alert('Erro ao salvar o registro'); location.href='atividadesFormulario.php';</script>"; 			
    }
  }else{
    echo 'Falha ao conectar: '.mysqli_error();
}

?>