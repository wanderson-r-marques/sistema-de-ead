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
and a.cargo_saude in (7)
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
          <p class="lead text-center"> CARGOS DE NÍVEL SUPERIOR - SAÚDE </p>
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
                  <td>Relacionamento Interpessoal.</td>
                  <td>1. É importante se relacionar bem com os colegas de trabalho. Como você pretende contribuir para o bom relacionamento interpessoal?  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td>2. No ambiente de trabalho é importante ser educado e respeitoso. Por que estes comportamentos são fundamentais no exercício de sua profissão?</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Liderança</td>
                  <td>3. É importante participar de equipes, processos, recursos e agendas que envolvam a efetiva realização das rotinas de trabalho. Como você pretende contribuir para fortalecer estes aspectos funcionais? </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                 <tr>
                  <td></td>
                  <td>4. Você irá trabalhar sob a liderança de um gestor e numa equipe hierarquizada. Como você pretende contribuir para o fortalecimento da gestão? </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Foco em Resultados</td>
                  <td>5. Por que é importante um ambiente de trabalho organizado e planejado? </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>    
                   <tr>
                  <td></td>
                  <td>6. Por que é importante o estabelecimento de metas, o monitoramento e a constante atualização de seus resultados?</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                 <tr>
                  <td>Senso de humanização</td>
                  <td>7. É importante ser acolhedor com as pessoas que utilizam os serviços públicos. Como você pretende contribuir com essa obrigação funcional? </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                   <tr>
                  <td></td>
                  <td>8. Por que a humanização do ambiente de trabalho é um compromisso coletivo?</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td>9. Qual a mais importante obrigação de sua profissão no que se refere ao senso de humanização do trabalho? </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                    <tr>
                  <td>Gerenciamento do Tempo</td>
                  <td>10. O gerenciamento do tempo funcional exige o cumprimento da jornada de trabalho e de suas rotinas. Como você pretende contribuir com esse importante processo? </td>
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
          <p class=""><br>NOTA ALCANÇADA NA ENTREVISTA: ___________</p>
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