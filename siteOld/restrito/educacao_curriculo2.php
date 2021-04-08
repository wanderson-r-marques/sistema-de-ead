<?php


//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);

require_once('valida.php');


$query = "SELECT a.candidado,
       upper(a.nome) as nome,
       a.cpf,
       CONCAT(c.modalidade, ' ',c.local) as modalidade
       
  from Candidatos a 
  JOIN cargo_educacao c on a.cargo_educacao=c.cargo_educacao

where  vaga_saude_educacao='Educação'
and a.inscricao_confirmada='CONFIRMADA'
and a.cargo_educacao in (8,9,11,12,14,15,16,17,18,41)
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
          <p class="lead text-center">AVALIAÇÃO DA ANÁLISE DE CURRÍCULO DA SECRETARIA DA EDUCAÇÃO </p>
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
                  <td>Comprovação de experiência profissional na especialidade para a qual concorre</td>
                  <td>05 PONTOS (POR SEMESTRE)</td>
                  <td>20 PONTOS (ATÉ 02 ANOS) </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Certificado ou declaração de conclusão de Especialização Lato sensu na especialidade a qual concorre.</td>
                  <td>10 PONTOS (POR CURSO)</td>
                  <td>10 PONTOS </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Certificado ou declaração de conclusão de Curso de Especialização Stricto sensu na especialidade a qual concorre.</td>
                  <td>05 PONTOS (POR CURSO)</td>
                  <td>10 PONTOS </td>
                  <td></td>
                  <td></td>
                </tr>
                 
                    <tr>
                  <td>TOTAL</td>
                  <td></td>
                  <td>40 PONTOS</td>
                  <td></td>
                </tr>

                 


              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

          <p class=""><br>Avaliador (a): ____________________________________________________</p>
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