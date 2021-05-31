<?php
require_once 'valida.php';
// Função para colocar os alunos na sessão
if ($_GET['funcao'] == 'alunos') {
    print_r($_POST['turmas']);
}