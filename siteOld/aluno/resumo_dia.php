
<?php 
 require_once("../restrito/conexao.php");
 $con = conectar();


$query = "
SELECT CONVERT(A.DATA_HORA,DATE) as data, COUNT(*) as qtd
FROM AC_ACESSO_WEB A
GROUP BY CONVERT(A.DATA_HORA,DATE) desc";
$exec = $con->prepare($query);
$exec->execute();


$query1 = "
SELECT  B.DATA as data, COUNT(*) AS qtd
FROM (SELECT A.ENTIDADE,
       CONVERT(A.DATA_HORA,DATE) AS DATA
FROM AC_ACESSO_WEB A
GROUP BY A.ENTIDADE,CONVERT(A.DATA_HORA,DATE))  AS B

GROUP BY B.DATA 
ORDER BY B.DATA DESC";
$exec1 = $con->prepare($query1);
$exec1->execute();

$query2 = "
SELECT COUNT(*) AS QTD
FROM (
SELECT A.ENTIDADE
FROM AC_ACESSO_WEB A
GROUP BY A.ENTIDADE) AS B";
$exec2 = $con->prepare($query2);
$exec2->execute();
$linha2 = $exec2->fetch(PDO::FETCH_ASSOC); 

$query3 = "
SELECT 
         
       H.DESCRICAO AS CURSO,
       D.DESCRICAO AS TURMA,
       J.nome,
       CONVERT(A.DATA_HORA,DATE) AS DATA_REALIZACAO,
       E.DESCRICAO AS DISCIPLINA,
       G.DESCRICAO AS TIPO_MATERIAL
       
      
       
       
FROM AC_REALIZADO_ALUNOS        A
JOIN AC_MATRICULA_DISCIPLINAS   B ON A.ENTIDADE = B.ENTIDADE
JOIN AC_CADASTRO_ALUNOS         C ON A.ENTIDADE = C.ENTIDADE
JOIN AC_CADASTRO_TURMAS         D ON B.AC_CADASTRO_TURMA = D.AC_CADASTRO_TURMA
JOIN AC_CADASTRO_DISCIPLINAS    E ON B.AC_CADASTRO_DISCIPLINA_2 =E.AC_CADASTRO_DISCIPLINA
JOIN AC_MATERIAL_PARA_ALUNOS    F ON A.AC_MATERIAL_PARA_ALUNOS = F.AC_MATERIAL_PARA_ALUNOS
JOIN AC_CADASTRO_TIPO_MATERIAIS G ON F.AC_CADASTRO_TIPO_MATERIAL = G.AC_CADASTRO_TIPO_MATERIAL
JOIN AC_CADASTRO_CURSOS         H ON D.AC_CADASTRO_CURSO = H.AC_CADASTRO_CURSO
JOIN EMPRESAS_USUARIAS          I ON H.EMPRESA_USUARIA = I.EMPRESA_USUARIA
LEFT JOIN usuarios              J ON F.AC_PROFESSOR = J.ac_professor

WHERE CONVERT(F.DATA_CADASTRO, DATE)= CURDATE()
ORDER BY  I.NOME,H.DESCRICAO, D.DESCRICAO,E.DESCRICAO
";
$exec3 = $con->prepare($query3);
$exec3->execute();

$query4 = "
SELECT 
       D.DESCRICAO AS CURSO,       
       A.DESCRICAO AS NOME_DO_ASSUNTO,
       B.nome AS PROFESSOR,
       E.DESCRICAO AS TIPO_MATERIAL,
       DATE_FORMAT(STR_TO_DATE(A.DATA_CADASTRO, '%Y-%m-%d'), '%d/%m/%Y') AS DATA_CADASTRO,
       EXTRACT(MONTH FROM A.DATA_CADASTRO) AS MES,
       
       A.LINK 
       
FROM AC_MATERIAL_PARA_ALUNOS    A
JOIN usuarios                   B ON A.`AC_PROFESSOR` = B.`ac_professor`
JOIN AC_CADASTRO_TURMAS         C ON A.`AC_CADASTRO_TURMA` = C.AC_CADASTRO_TURMA
JOIN AC_CADASTRO_CURSOS	        D ON C.`AC_CADASTRO_CURSO` = D.`AC_CADASTRO_CURSO`
JOIN AC_CADASTRO_TIPO_MATERIAIS E ON A.`AC_CADASTRO_TIPO_MATERIAL` = E.`AC_CADASTRO_TIPO_MATERIAL`
";
$exec4 = $con->prepare($query4);
$exec4->execute();

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12"><img class="img-fluid d-block mx-auto" src="../images/famasul.jpeg"></div>
        <p class="mb-12 lead teste"><br>Quantidades de Alunos distintos que já acessaram a plataforma : <b><?= $linha2['QTD']; ?></b> </p>
    </div>
    </div>
  </div>
  <!--
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="panel-heading">Quantidade de Acesso Diários - </div>
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead class="thead-dark">
                <tr>
                  <th>Data </th>
                  <th>qtd</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                while($linha = $exec->fetch(PDO::FETCH_ASSOC)){  
                  ?>
                  <tr>
                    <td><?= date('d/m/Y', strtotime($linha['data'])); ?></td>
                    <td><?= $linha['qtd'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="panel-heading">Quantidade de Acesso Diários POR ALUNO </div>
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead class="thead-dark">
                <tr>
                  <th>Data </th>
                  <th>qtd</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                while($linha = $exec1->fetch(PDO::FETCH_ASSOC)){  
                  ?>
                  <tr>
                    <td><?= date('d/m/Y', strtotime($linha['data'])); ?></td>
                    <td><?= $linha['qtd'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
-->
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="panel-heading">link de todos os Materias liberados pelo Professores </div>
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead class="thead-dark">
                <tr>
                  <th>Curso </th>
                  <th>Assunto </th>
                  <th>Professor </th>
                  <th>Tipo Material </th>
                  <th>Data de Cadastro </th>
                  <th>Mês </th>
                  <th>Link </th>
                </tr>
              </thead>
              <tbody>

                <?php 
                while($linha = $exec4->fetch(PDO::FETCH_ASSOC)){  
                  ?>
                  <tr>
                    <td><?= $linha['CURSO'] ?></td>
                    <td><?= $linha['NOME_DO_ASSUNTO'] ?></td>
                    <td><?= $linha['PROFESSOR'] ?></td>
                    <td><?= $linha['TIPO_MATERIAL'] ?></td>
                    <td><?= date('d/m/Y', strtotime($linha['DATA_CADASTRO'])); ?></td>
                    <td><?= $linha['MES'] ?></td>
                    
                    <td><a href="<?= $linha['LINK'] ?>" target="_blank"> <?= $linha['LINK'] ?> </a></td>
                    
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="panel-heading">Quantidade Atividade Respondidas por disciplinas </div>
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead class="thead-dark">
                <tr>
                  <th>Faculdade</th>
                  <th>Curso</th>
                  <th>Turma</th>
                  <th>Disciplina</th>
                  <th>Qtd</th>
                  
                </tr>
              </thead>
              <tbody>

                <?php 
                while($linha3 = $exec3->fetch(PDO::FETCH_ASSOC)){  
                  ?>
                  <tr>
                    <td><?= $linha3['FACULDADE']; ?></td>
                    <td><?= $linha3['CURSO'] ?></td>
                    <td><?= $linha3['TURMA'] ?></td>
                     <td><?= $linha3['DISCIPLINA'] ?></td>
                    <td><?= $linha3['QTD'] ?></td>


                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>