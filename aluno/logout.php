<?php 
session_start();
unset($_SESSION['cpf']);
header('Location:../index.php');