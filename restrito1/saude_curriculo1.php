<?php


//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);

require_once('valida.php');


$query = "SELECT a.candidado,
       upper(a.nome) as nome,
       a.cpf,
       CONCAT(c.quadro,' - ',c.local,' - ',c.cargo) as modalidade
       
  from Candidatos a 
  JOIN cargo_saude c on a.cargo_saude=c.cargo_saude

where  vaga_saude_educacao='Saúde'
and a.inscricao_confirmada='CONFIRMADA'
and a.cargo_saude in (1,2,4,5,6,8,9,11,12,13,14,15,16,17,22,24,25,26,27,28,29,31,32,34,35,36,38,41,42,43,44,45,46,48,49,50,51,7,30,37)
order by a.nome";
$smtp = $con->prepare($query);
$smtp->execute();
$linha = $smtp->fetch(PDO::FETCH_OBJ);

// Aqui pega os dados
$inscricao = $linha->candidado;
$nome = $linha->nome;
$modalidade = $linha->modalidade;
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
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="lead text-center">AVALIAÇÃO DA ANÁLISE DE CURRÍCULO DA SECRETARIA DA SAÚDE </p>
          <p class="lead text-center"> — PALMARES, 19 DE JANEIRO DE 2019 — </p>
          <p class="lead text-center"> CARGO DE NÍVEL SUPERIOR </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="text-monospace">Identificação do Candidato</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 border">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="fa text-primary mr-2 fa-share">                       &nbsp;Nº DE INSCRIÇÃO:  </i> <?= $inscricao ?> </li>
            <li class="list-group-item"><i class="fa text-primary mr-2 fa-share">                       &nbsp;NOME DO CANDIDATO:</i> <?= $nome ?>      </li>
            <li class="list-group-item" contenteditable="true"><i class="fa text-primary mr-2 fa-share">&nbsp;CARGO:            </i> <?= $modalidade ?></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="text-monospace"><br>Pontuação aferida na Análise Curricular</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead class="thead-dark">
                <tr>
                  <th>Indicador</th>
                  <th>Pontuação unitária</th>
                  <th>Pontuação máxima</th>
                  <th>Pontuação alcançada</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Diploma ou declaração de conclusão de curso de pós-graduação “stricto sensu” em nível de DOUTORADO, estritamente relacionado à área que concorre, emitido por instituição de ensino superior reconhecida pelo MEC.</td>
                  <td>5</td>
                  <td>5</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Diploma ou declaração de conclusão de curso de pós-graduação “stricto sensu” em nível de MESTRADO, estritamente relacionado à área e desempenho das funções que concorre, emitido por instituição de ensino superior reconhecida pelo MEC.</td>
                  <td>5</td>
                  <td>5</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Certificado de conclusão de curso de especialização, estritamente relacionado à área de desempenho das suas funções, com carga horária mínima de 120h, emitido por instituição legalmente reconhecida.</td>
                  <td>1</td>
                  <td>5</td>
                  <td></td>
                </tr>
                 <tr>
                  <td>Cursos de capacitação estritamente relacionados às atividades inerentes ao cargo para o qual o candidato se inscreveu, com carga horária mínima de 100h.</td>
                  <td>1</td>
                  <td>5</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Experiência profissional estritamente relacionada à atividade para a qual o candidato se inscreveu.</td>
                  <td>05 pontos por período de 06 meses trabalhados (máximo 2 anos). </td>
                  <td>20</td>
                  <td></td>
                </tr>    
                   <tr>
                  <td>Total</td>
                  <td></td>
                  <td>40</td>
                  <td></td>
                </tr>
                 

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class=""><br>Entrevistador (a): ____________________________________________________</p>
          <p class="text-center">Palmares,<?= date('d') ?> de <?= date('M') ?> de <?= date('Y') ?></p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>