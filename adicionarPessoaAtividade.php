<?php
//Aqui testa se o usuário está logado
  session_start();
  if (!isset($_SESSION['usuario'])){
	echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
  }

  $idPessoa = $_POST['idPessoa'];
  $idAtividade = $_POST['idAtividade'];

  include("conexao.php");

  if($conexao){
    $sql = "INSERT INTO tbPessoaAtividade (idpessoa, idatividade) values('$idPessoa', '$idAtividade');";
    $resultado = mysqli_query($conexao, $sql);
    mysqli_close($conexao);
    if($resultado == 1){
        echo "<script>alert('Registro salvo com sucesso!'); location.href='pessoaDetalhes.php?idPessoa=".$idPessoa."';</script>"; 
    }else{
        echo "<script>alert('Erro ao salvar o registro'); location.href='cadastrarPontuacao.php';</script>"; 			
    }
  }else{
    echo 'Falha ao conectar: '.mysqli_error();
}
?>