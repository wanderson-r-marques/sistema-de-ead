<?php
session_start();
/*
   * Wanderson Rodrigues Marques
   * Web Developer
   * https://github.com/wanderson-r-marques
*/
require_once('../helpers/enviar_arquivo.php');
require_once("../restrito/conexao.php");
$con = conectar();

?>

<?php
$nome_professor = $_SESSION['nome'];
$cod_professor = $_SESSION['ac_professor'];


if ($_POST['token'] == '43534gfgfg7f6g-*uyddhgjg') {
  $disciplina = explode('#', $_POST['disciplina']);
  $AC_CADASTRO_DISCIPLINA = $disciplina[0];
  $AC_CADASTRO_TURMA = $disciplina[1];
}

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



  <title>Professor Online - Sistema de Atividades Curriculares N??o Presenciais </title>

</head>

<body>

  <div class="py-5">
    <div class="container">
      <div class="row ">
        <div class="col-12">
          <img class="img-fluid d-block mx-auto" src="../images/site_educao.png">
          <p class="mb-3 lead teste text-center"><br>Frequ??ncia di??ria dos Alunos na plataforma
          </p>
          <p class="mb-4 text-center">Seja bem vindo(a) Professor(a): <b><?= $nome_professor; ?></b> </p>
          <form class="text-left " action="frequencia_aluno.php#tabela" method="post" enctype="multipart/form-data">
            <input type="hidden" name="token" value="43534gfgfg7f6g-*uyddhgjg">
            <div class="alert alert-secondary" role="alert">
              <h4><b>Suas turmas</b>

              </h4>
            </div>





            <label for="disciplina">Escolha a sua Turma?</label>
            <select onchange="this.form.submit()" name="disciplina" required readonly class="form-control" id="disciplina">
              <option value="">Selecione a turma para Cadastrar Instru????es</option>
              <?php
              $query = "SELECT 
                          A.ID AS TURMA 
                          ,B.AC_CADASTRO_DISCIPLINA
                          ,B.DESCRICAO
                          ,A.AC_PROFESSOR
                          ,C.ANO_LETIVO
                          ,D.NOME
                          ,C.AC_CADASTRO_CURSO AS AC_CADASTRO_TURMA
                          ,C.DESCRICAO AS NOME_TURMA
                  
                      FROM AC_TURMAS_DISCIPLINAS          A 
                      JOIN AC_CADASTRO_CURSOS             C ON   A.AC_CADASTRO_CURSO = C.AC_CADASTRO_CURSO
                      JOIN AC_CADASTRO_DISCIPLINAS        B ON A.AC_CADASTRO_DISCIPLINA = B.AC_CADASTRO_DISCIPLINA
                      LEFT JOIN usuarios                  D ON A.AC_PROFESSOR = D.USUARIO
                      WHERE A.AC_PROFESSOR=$cod_professor
                  
                  ";
              $smtp = $con->prepare($query);
              $smtp->execute();
              $rows = $smtp->fetchAll(PDO::FETCH_OBJ);
              foreach ($rows as $key => $value) {

                $selected = ($value->AC_CADASTRO_DISCIPLINA == $AC_CADASTRO_DISCIPLINA && $value->AC_CADASTRO_TURMA == $AC_CADASTRO_TURMA) ? 'selected' : '';

                echo "<option value='" . $value->AC_CADASTRO_DISCIPLINA . "#" . $value->AC_CADASTRO_TURMA . "' " . $selected . ">" . $value->TURMA . ' - ' . $value->NOME_TURMA . "</option>";
              }
              ?>
            </select>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="tabela">
    <div class="container">
      <div class="row">
        <table id="example" class="table  table-striped sampleTable table-bordered table-borderless table-hover table-sm" style="width:100%">
          <thead>
            <tr>
              <th>Data Acesso</th>
              <th>Matr??cula</th>
              <th>Nome</th>
              <th>Turma</th>
              <th>Disciplina</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $AC_CADASTRO_DISCIPLINA = $disciplina[0] ?? $value->AC_CADASTRO_DISCIPLINA;
            $AC_CADASTRO_TURMA = $disciplina[1] ?? $value->AC_CADASTRO_TURMA;



          
                        // Select com POST
                        $query = "SELECT DISTINCT
                        A.ENTIDADE,
                        C.NOME,
                        CONVERT(A.DATA_HORA,DATE) AS DATA_ACESSO,
                        D.DESCRICAO AS TURMA,
                        E.`DESCRICAO` AS DISCIPLINA
            
                        FROM AC_ACESSO_WEB A
                        JOIN AC_MATRICULA_DISCIPLINAS B ON A.ENTIDADE = B.ENTIDADE
                        JOIN AC_CADASTRO_ALUNOS       C ON A.ENTIDADE = C.ENTIDADE
                        JOIN AC_CADASTRO_CURSOS       D ON B.AC_CADASTRO_TURMA = D.AC_CADASTRO_CURSO
                        JOIN AC_CADASTRO_DISCIPLINAS  E ON B.AC_CADASTRO_DISCIPLINA =E.AC_CADASTRO_DISCIPLINA
                        WHERE B.AC_CADASTRO_DISCIPLINA=$AC_CADASTRO_DISCIPLINA 
                        AND B.AC_CADASTRO_TURMA =$AC_CADASTRO_TURMA
                        ORDER BY A.DATA_HORA DESC , C.NOME";
            


            $smtp = $con->prepare($query);
            $smtp->execute();
            $rows = $smtp->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $value) {
            ?>
              <tr>
                <td><?= date('d/m/Y', strtotime($value->DATA_ACESSO)); ?></td>
                <td><?= $value->ENTIDADE ?></td>
                <td><?= $value->NOME ?></td>
                <td><?= $value->TURMA ?></td>
                <td><?= $value->DISCIPLINA ?></td>

          

              </tr>
            <?php  } ?>

          </tbody>
          <tfoot>
            <tr>
              <th>Data Acesso</th>
              <th>Matr??cula</th>
              <th>Nome</th>
              <th>Turma</th>
              <th>Disciplina</th>
            </tr>
          </tfoot>
        </table>
        <br><br>
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
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-1x py-1 fa-download"></i> Resid??ncia </button>
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
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-1x py-1 fa-download"></i> Certid??o </button>
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
    $('.money').mask('#.##0,00', {
      reverse: true
    });
  </script>

</body>

</html>