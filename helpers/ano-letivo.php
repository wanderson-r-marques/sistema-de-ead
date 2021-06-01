<?php 

function ano_letivo($con){
   
    $query = "SELECT ANO from ano ORDER BY ANO DESC LIMIT 1";
	$smtp = $con->prepare($query);
	$smtp->execute();
	$linha = $smtp->fetch(PDO::FETCH_OBJ);
	return $linha->ANO;
}