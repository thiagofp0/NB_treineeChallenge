<script type="text/javascript">
        function negado(){
            setTimeout("window.location='login.php'", 5000);
        }
    </script>
<?php
    session_start();
    if (!isset($_SESSION['usuario'])){
      echo "<script>alert('O usuário não foi autenticado!!!'); location.href='login.php';</script>"; 
    }

    //$idPessoaAtividade = $_GET['idPessoaAtividade'];
    $idPessoa = $_GET['idPessoa'];
    $idAtividade = $_GET['idAtividade'];

    include("conexao.php");

    if($conexao){

        $sql = "DELETE FROM tbPessoaAtividade WHERE idPessoaAtividade = '$idPessoaAtividade';";
        $result = mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        if($resultado == 1){
			echo "<script>alert('Registro excluído com sucesso!'); location.href='atividadesPessoaTabela.php';</script>"; 
		}else{
      echo "<script>negado();</script>";
			//echo "<script>alert('Erro ao excluir o registro'); location.href='atividadesPessoaTabela.php';</script>"; 			
		}
    }else{
        echo 'Falha ao conectar: '.mysqli_error();
    }
?>