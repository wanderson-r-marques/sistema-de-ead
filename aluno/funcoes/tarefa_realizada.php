
<?php 
include '../../restrito/conexao.php';
if ($_POST['prova'] !== '' ) {
	//$prova = $_POST['prova'];
	$temp = explode('#', $_POST['prova']);
	$prova = $temp[0];
	$entidade = $temp[1];
	//$revisou = $_POST['revisou'];
	//$data_hora = date('Y-m-d H:i:s');
	$query = "INSERT INTO AC_REALIZADO_ALUNOS (
		AC_MATERIAL_PARA_ALUNOS,
		DATA_HORA,
		ENTIDADE )
	   VALUES ('$prova',NOW(),'$entidade'
	   )";

  $con = conectar();
  $smtp = $con->prepare($query);
  
  if($smtp->execute()){
	echo date('d/m/Y');
  }


}
?>