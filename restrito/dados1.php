<!--
  * Wanderson Rodrigues Marques
  * Web Developer
  * https://github.com/wanderson-r-marques
-->

<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);

require_once('valida.php');

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

  <link rel="stylesheet" href="../css/bootstrap-4.3.1.css">
  <link href="../css/select2.min.css" rel="stylesheet" />
  <link href="../css/style.css" type="text/css" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
  <style type="text/css" class="init">

  </style>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/buttons.flash.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="js/buttons.print.min.js"></script>
  <script type="text/javascript" language="javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" language="javascript" src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.mask.min.js"></script>



  <script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>



  <title>PROCESSO SELETIVO SIMPLIFICADO E UNIFICADO </title>

</head>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"><img class="img-fluid d-block mx-auto" src="http://famasul.edu.br/processo_seletivo_012019/images/logo.png"></div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-md bg-success navbar-dark">
    <div class="container"> <a class="navbar-brand text-primary" href="#">
        <b class="text-white">PROCESSO SELETIVO DE PALMARES</b>
      </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar4">
        <ul class="navbar-nav ml-auto">
          <a class="btn navbar-btn ml-md-2 btn-light">Candidatos</a><a href="logout.php" class="btn navbar-btn ml-md-2 btn-danger text-white">Sair</a>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <table id="example" class="table  table-striped sampleTable table-bordered table-borderless table-hover table-sm" style="width:100%">
          <thead>
            <tr>
              <th>Nome</th>
              <th style="min-width: 100px;">CPF</th>
              <th>Nascimento</th>
              <th>Modalidade</th>
              <th>Secretária</th>
              <th>Isento</th>
              <th>Depósito</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $query = "SELECT *
                       from (SELECT a.nome,
                          LPAD(CAST(a.candidado AS CHAR),6,'0') as inscricao,
                          a.cpf,
                          a.rg,
                          a.data_nascimento,
                          a.vaga_saude_educacao,
                          CONCAT(b.modalidade, ' ',b.local) as modalidade,
                          a.inscricao_confirmada,
                          a.isento,
                          b.valor,
                          a.doc_deposito,
                          a.doc_rg,
                          a.doc_cpf,
                          a.doc_diploma,
                          a.doc_carteira,
                          a.doc_certidao,
                          a.doc_residencia,
                          a.data_deposito,
                          a.valor_deposito
                          
                          
                       FROM `Candidatos` a
                       JOIN cargo_educacao b on a.cargo_educacao=b.cargo_educacao
                                        
                       union 
                       
                       SELECT a.nome,
                          LPAD(CAST(a.candidado AS CHAR),6,'0') as inscricao,
                          a.cpf,
                          a.rg,
                          a.data_nascimento,
                          a.vaga_saude_educacao,
                          CONCAT(c.quadro,' - ',c.local,' - ',c.cargo) as modalidade,
                          a.inscricao_confirmada,
                          a.isento,
                          c.valor,
                          a.doc_deposito,
                          a.doc_rg,
                          a.doc_cpf,
                          a.doc_diploma,
                          a.doc_carteira,
                          a.doc_certidao,
                          a.doc_residencia,
                          a.data_deposito,
                          a.valor_deposito
                          
                              
                       FROM `Candidatos` a
                       JOIN cargo_saude c on a.cargo_saude=c.cargo_saude) as g
                       order by g.inscricao                       
                        
                        ";
            $smtp = $con->prepare($query);
            $smtp->execute();
            $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
            foreach ($linhas as $key => $value) {
              // Verificando isenção
              if ($value->isento) {
                $checked = 'checked';
              } else {
                $checked = '';
              }

              // Verificando comprovante
              if ($value->doc_deposito) {
                $comprovante = 'Enviado';
              } else {
                $comprovante = 'Aguardando';
              }

              if ($value->inscricao_confirmada == 'Confirmada') {
                $classInscricao = 'text-success';
              } else if($value->inscricao_confirmada == 'Pendente') {
                $classInscricao = 'text-warning';
              } else if($value->inscricao_confirmada == 'Anulada') {
                $classInscricao = 'text-danger';
              }
            ?>
              <tr>
                <td> <a style="cursor: pointer; text-align:left; font-weight: bold;" role="button" pk="<?= $value->inscricao ?>" class="<?= $classInscricao ?> candidato"> <?= strtoupper($value->nome); ?> </a></td>
                <td><?= $value->cpf; ?></td>
                <td><?= date('d/m/Y', strtotime($value->data_nascimento)); ?></td>
                <td><?= strtoupper($value->modalidade); ?></td>
                <td><?= strtoupper($value->vaga_saude_educacao); ?></td>
                <td class="text-center">
                  <span>
                    <input type="checkbox" <?= $checked ?> name="isento" pk="<?= $value->inscricao ?>">
                  </span>
                </td>
                <td><?= strtoupper($comprovante); ?></td>
              </tr>
            <?php  } ?>

          </tbody>
          <tfoot>
            <tr>
              <th>Nome</th>
              <th>CPF</th>
              <th>Nascimento</th>
              <th>Modalidade</th>
              <th>Secretária</th>
              <th>Isento</th>
              <th>Depósito</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dados do candidato</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <span id="m_inscricao"></span><br>
          <span id="m_candidato"></span><br>
          <span id="m_cpf"></span><br>
          <span id="m_modalidade"></span><br><br>

          <div class="form-row">
            <div class="col-5">
              <input type="date" class="form-control" name="data_pag" placeholder="Data do pagamento">
            </div>
            <div class="col-4">
              <input type="text" class="form-control money" name="valor_pag" placeholder="Valor pago">
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-md-12">


              <div class="btn-group dropright doc_deposito d-none">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-1x py-1 fa-download"></i> Comprovante </button>
                <div class="dropdown-menu">
                  <a target="_blank" class="dropdown-item v_doc_deposito" href="#">Visualizar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-danger text-white e_doc_deposito excluir_doc" table="doc_deposito" href="#">Excluir</a>
                </div>
              </div>


              <div class="btn-group dropright doc_rg d-none">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-1x py-1 fa-download"></i> RG </button>
                <div class="dropdown-menu"> <a target="_blank" class="dropdown-item v_doc_rg" href="#">Visualizar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-danger text-white e_doc_rg excluir_doc" table="doc_rg" href="#">Excluir</a>
                </div>
              </div>


              <div class="btn-group dropright doc_cpf d-none">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-1x py-1 fa-download"></i> CPF </button>
                <div class="dropdown-menu"> <a target="_blank" class="dropdown-item v_doc_cpf" href="#">Visualizar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-danger text-white e_doc_cpf excluir_doc" table="doc_cpf" href="#">Excluir</a>
                </div>
              </div>


              <div class="btn-group dropright doc_residencia d-none">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-1x py-1 fa-download"></i> Residência </button>
                <div class="dropdown-menu"> <a target="_blank" class="dropdown-item v_doc_residencia" href="#">Visualizar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-danger text-white e_doc_residencia excluir_doc" table="doc_residencia" href="#">Excluir</a>
                </div>
              </div>


              <div class="btn-group dropright doc_diploma d-none">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-1x py-1 fa-download"></i> Diploma </button>
                <div class="dropdown-menu"> <a target="_blank" class="dropdown-item v_doc_diploma" href="#">Visualizar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-danger text-white e_doc_diploma excluir_doc" table="doc_diploma" href="#">Excluir</a>
                </div>
              </div>


              <div class="btn-group dropright doc_carteira d-none">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-1x py-1 fa-download"></i> Carteira </button>
                <div class="dropdown-menu"> <a target="_blank" target="_blank" class="dropdown-item v_doc_carteira" href="#">Visualizar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-danger text-white e_doc_carteira excluir_doc" table="doc_carteira" href="#">Excluir</a>
                </div>
              </div>


              <div class="btn-group dropright doc_certidao d-none">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-1x py-1 fa-download"></i> Certidão </button>
                <div class="dropdown-menu"> <a target="_blank" class="dropdown-item v_doc_certidao" href="#">Visualizar</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item bg-danger text-white e_doc_certidao excluir_doc" table="doc_certidao" href="#">Excluir</a>
                </div>
              </div>

            </div>
          </div>

        </div>
        <br><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="anular">Anular</button>
          <button type="button" class="btn btn-success" id="confirmar">Confirmar</button>

        </div>
      </div>
    </div>
  </div>


  <script>
    $('.data').mask('99/99/9999');
    $('.money').mask('#.##0,00', {reverse: true});

  </script>

</body>

</html>