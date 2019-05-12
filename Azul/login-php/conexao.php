<?php
define('HOST', 'localhost');
define('USUARIO', 'id9553299_root');
define('SENHA', 'endereco19');
define('DB', 'id9553299_login');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
