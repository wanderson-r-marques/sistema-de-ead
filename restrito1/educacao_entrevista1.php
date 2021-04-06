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
and a.cargo_educacao in (19,20,21,22,23,24,25,26,27,28,29,30,34,35,36,37,38,39,40)
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
          <p class="lead text-center">ENTREVISTA DE CANDIDATOS DO PROCESSO SELETIVO SAÚDE/EDUCAÇÃO </p>
          <p class="lead text-center"> — PALMARES, 19 DE JANEIRO DE 2019 — </p>
          <p class="lead text-center"> CARGOS DE NÍVEL FUNDAMENTAL - EDUCAÇÃO </p>
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
          <p class="text-monospace"><br>Pontuação aferida na Entrevista</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered ">
              <thead class="thead-dark">
                <tr>
                  <th>Indicador</th>
                  <th>Pergunta</th>
                  <th>Resposta não atende (0,0)</th>
                  <th>Resposta atende abaixo do esperado (1,0)</th>
                  <th>Resposta atinge parcialmente o esperado(2,0)</th>
                  <th>Resposta atinge o esperado(4,0)</th>
                  <th>Resposta atinge o acima do esperado(6,0)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Proatividade.</td>
                  <td>1. Por que você, no ambiente de trabalho, precisa ser uma pessoa cumpridora de suas tarefas? </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td>2. Por que você, no ambiente de trabalho, precisa ser produtivo?</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Relacionamento Interpessoal</td>
                  <td>3. Por que, no ambiente de trabalho, é importante se relacionar bem com os colegas de trabalho?  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                 <tr>
                  <td></td>
                  <td>4. Por que, no ambiente de trabalho, é importante ser educado e respeitoso? </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Espírito de Equipe</td>
                  <td>5. Por que o trabalho em equipe é importante para você? Explique.</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>    
                   <tr>
                  <td></td>
                  <td>6. O trabalho em equipe é mais produtivo? Explique.</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                 <tr>
                  <td>Organização</td>
                  <td>7. Por que é importante um ambiente de trabalho organizado?</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                   <tr>
                  <td></td>
                  <td>8. Por que o cargo a que você concorre é importante para a organização do ambiente de trabalho?</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Senso de humanização</td>
                  <td>9. Por que é importante ser atencioso com as pessoas que utilizam os serviços do ambiente de trabalho, onde você pretende trabalhar?</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                  <td></td>
                  <td>10. Por que você apoia que o ambiente de trabalho seja um lugar mais humano e participativo?</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>


                 


              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class=""><br>Nota alcançada na entrevista: ________</p>
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