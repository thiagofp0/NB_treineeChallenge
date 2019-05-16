<?php
    session_start();
    include('conexao.php');

    
    if(empty($_POST['usuario']) || empty($_POST['senha'])) {
        header('Location: index.php');
        exit();
    } 
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
    
        if($conexao){
            $sql = "SELECT * FROM tblogin WHERE  usuario = '$usuario' AND senha='$senha';";
            $resultado = mysqli_query($conexao, $sql);
            $row = mysqli_num_rows($resultado);
            mysqli_close($conexao);
    
            if($row > 0){
    
                foreach ($resultado as $linha) {    
                    $_SESSION['usuario']=$usuario;
                    $_SESSION['senha']=$senha;
                    header("Location: painel.php");
                    //echo "<script>alert('entrou!');</script>";
                }
    
                
            }else{
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                echo "<script>alert('Usuário ou senha inválidos');</script>";
                echo "<script>location.href='login.php'</script>";
            }
        }else{
            echo 'Falha ao conectar: '.mysqli_error();
        }
?>