<?php
require('valida.php');
//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);

require_once('../helpers/enviar_arquivo.php');

// Inicializando variavel de alerta
$alerta = '';
$cod_matricula = $_SESSION['cod_matricula_aca'];



?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap-4.3.1.css">
  <link href="../css/select2.min.css" rel="stylesheet" />
  <link href="../css/style.css" type="text/css" />
  <title>Sistema de Atividades Curriculares Não Presenciais</title>

</head>

<body>
  <div class="py-5 text-center" style="background-image: url('../images/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="bg-white p-5 mx-auto col-md-12 col-12">
          <img class="img-fluid d-block mx-auto" src="../images/famasul.jpeg">
          <p class="mb-3 lead teste"><br>Dados do Aluno</p>
          <div class="row">
            <div class="col-md-12">
              <?= $alerta; ?>
              <div class="card text-left">
                <div class="card-header text-uppercase bg-success text-white"> <b> SEJA BEM VINDO ! </b>
                  <span style="float: right"><a href="logout.php" style="color:#fff; text-decoration: none; font-weight: bold">Sair</a> </span> </div>
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-6">
                      <h5 class="card-title">Matrícula: <b><?= $atributo->ENTIDADE; ?></b></h5>
                      <h5 class="card-title">Nome Aluno: <b><?= $atributo->NOME; ?></b></h5>
                      <p class="card-text">CPF: <b><?= $atributo->INSCRICAO_FEDERAL; ?></b></p>
                      <p class="card-text">Curso: <b><?= $atributo->CURSO; ?></b></p>

                      <!--<p class="card-text">- RECURSO DO RESULTADO PRELIMINAR PRÁTICA - <b></p>
                      <p class="card-text">Objeto do Recurso (Síntese): <b></p> <?= $atributo->objeto; ?></b></p> 
                      <p class="card-text">Resposta ao Recurso: <b></p><?= $atributo->recurso; ?></b></p> 
                      <p class="card-text">Resultado do Recurso: <b></p><?= $atributo->resposta; ?></b></p> </p>
                      <p class="card-text">- RECURSO DO RESULTADO PRELIMINAR - <b></p>
                      <p class="card-text">Objeto do Recurso (Síntese): <b></p> <?= $atributo->objeto1; ?></b></p> 
                      <p class="card-text">Resposta ao Recurso: <b></p><?= $atributo->recurso1; ?></b></p> 
                      <p class="card-text">Resultado do Recurso: <b></p><?= $atributo->resposta1; ?></b></p> -->

                    </div>
                    <div class="col-md-6 ">
                      <hr class="d-block d-sm-none">

                      <p class="card-text">Ano Letivo / Semestre: <b><?= $atributo->ANO_LETIVO; ?></b></p>
                      <p class="card-text">Código Turma: <b><?= $atributo->AC_CADASTRO_TURMA; ?></b></p>
                      <p class="card-text">Descrição da Turma: <b><?= $atributo->TURMA_DESC; ?></b></p>
                    </div>
                  </div>

                  <hr>

                  <form method="post" action="dados.php" enctype="multipart/form-data">
                    <input type="hidden" name="token" value="8dft7gdf6g&¨8FDFD---">
                    <div class="list-group">
                      <a class="list-group-item list-group-item-action active bg-warning text-dark">
                        <h2><b>Disciplinas a serem cursadas em <b><?= $atributo->ANO_LETIVO; ?></b></h2></b>
                      </a>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel">
                            <div class="panel-heading">
                              <cente>
                                <!--   <h2 class="text-center"> Matérial Disponivel </h2>-->
                              </cente>
                            </div>



                            <?php

                            $query = "
                                         SELECT DISTINCT
                                                  A.AC_MATRICULA,
                                                  A.AC_CADASTRO_DISCIPLINA,
                                                  A.AC_CADASTRO_DISCIPLINA_2 AS COD_DISCPLINA,
                                                  B.DESCRICAO AS NOME_DISCIPLINA,
                                                  C.AC_PROFESSOR,
                                                  D.NOME AS NOME_PROFESSOR,
                                                  A.AC_CADASTRO_TURMA,
                                                  A.PERIODO_DISCIPLINA
                                            FROM AC_MATRICULA_DISCIPLINAS       A 
                                            JOIN AC_CADASTRO_DISCIPLINAS        B ON A.AC_CADASTRO_DISCIPLINA_2 = B.AC_CADASTRO_DISCIPLINA
                                            JOIN AC_CADASTRO_TURMAS_DISCIPLINAS C ON A.AC_CADASTRO_TURMA = C.AC_CADASTRO_TURMA 
                                                                                AND A.AC_CADASTRO_DISCIPLINA_2 = C.AC_CADASTRO_DISCIPLINA
                                            LEFT JOIN PESSOAS_FISICAS           D ON C.AC_PROFESSOR = D.ENTIDADE
                                            
                                            WHERE A.AC_MATRICULA=$cod_matricula
                                            ORDER BY NOME_DISCIPLINA
                                         ";
                            $db = $con->prepare($query);
                            $db->execute();

                            ?>

                            <div class="table-responsive">
                              <table class="table table-bordered table-hover table-sm table-striped" style="font-size: 18px;">
                                <thead class="thead-dark">
                                  <tr>
                                    <th>Código Disciplina</th>
                                    <th>Período</th>
                                    <th>Descrição Disciplina</th>
                                    <th>Professor</th>


                                  </tr>
                                </thead>
                                <tbody>

                                  <?php

                                  $dados = $db->fetchAll(PDO::FETCH_ASSOC);

                                  foreach ($dados as $linha) {


                                    if ($linha['LINK'] <> null) {
                                      $cor = "red";
                                    }
                                  ?>

                                    <tr>
                                      <td><?= $linha['COD_DISCPLINA'] ?></td>
                                      <td><?= $linha['PERIODO_DISCIPLINA'] ?></td>

                                      <td><?= $linha['NOME_DISCIPLINA'] ?></td>
                                      <td><?= $linha['NOME_PROFESSOR'] ?></td>


                                      <!--<td style="padding-left: 50px;">
                                          <?php if ($linha['LINK'] != '') : ?>
                                            <a class="text-black" style="color: #000000; text-decoration: none;" target="_blank" href="<?= $linha['LINK']; ?>" title="">
                                              <?= 'Visualizar Arquivo'; ?>
                                            </a>
                                          <?php endif ?>
                                        </td> -->

                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>


                      </div>
                      <br>
                      <!--  <div class="text-right">
                        <input disabled type="submit" name="enviar" value="Enviar documentos" class="btn btn-warning btn-lg" />
                      </div> -->
                  </form>




                  <hr>
                  <h2>Material cadastrado</h2>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm table-striped">
                      <thead>
                        <tr>
                          <th>Visto</th>
                          <th>Data Realização</th>
                          <th>Data Postagem</th>
                          <th>Cód. Material</th>

                          <th>Titulo do Material</th>
                          <th>Disciplina</th>
                          <th>Carga Horária</th>
                          <th>Tipo do Material</th>
                          <th>Material Enviado</th>


                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $query = " 
                        SELECT 
                                A.AC_MATRICULA,
                                F.DESCRICAO AS TURMA,
                                A.AC_CADASTRO_DISCIPLINA_2,
                                B.DESCRICAO,
                                C.AC_PROFESSOR,
                                A.ENTIDADE,
                                D.NOME,
                                A.AC_CADASTRO_TURMA,
                                E.AC_CADASTRO_TIPO_MATERIAL,
                                G.DESCRICAO AS TIPO_MATERIAL,
                                E.LINK,
                                H.DATA_HORA AS DATA_REALIZADA,
                                E.AC_MATERIAL_PARA_ALUNOS,
                                E.DATA_CADASTRO AS DATA_CADASTRO,
                                E.QTD_HORAS,
                                E.DESCRICAO AS TEMA_ASSUNTO,
                                I.LINK AS LINK_ENVIADO

                        FROM AC_MATRICULA_DISCIPLINAS       	A 
                        JOIN AC_CADASTRO_DISCIPLINAS        	B ON A.AC_CADASTRO_DISCIPLINA_2 = B.AC_CADASTRO_DISCIPLINA
                        JOIN AC_CADASTRO_TURMAS_DISCIPLINAS 	C ON A.AC_CADASTRO_TURMA = C.AC_CADASTRO_TURMA 
									AND A.AC_CADASTRO_DISCIPLINA_2 = C.AC_CADASTRO_DISCIPLINA
                        LEFT JOIN PESSOAS_FISICAS       	D ON C.AC_PROFESSOR = D.ENTIDADE
                        JOIN AC_MATERIAL_PARA_ALUNOS        	E ON A.AC_CADASTRO_TURMA = E.AC_CADASTRO_TURMA 
									AND A.AC_CADASTRO_DISCIPLINA_2 = E.AC_CADASTRO_DISCIPLINA_2
									AND C.AC_PROFESSOR = E.AC_PROFESSOR
                        JOIN AC_CADASTRO_TURMAS             	F ON A.AC_CADASTRO_TURMA = F.AC_CADASTRO_TURMA
                        JOIN AC_CADASTRO_TIPO_MATERIAIS     	G ON E.AC_CADASTRO_TIPO_MATERIAL = G.AC_CADASTRO_TIPO_MATERIAL
                        LEFT JOIN AC_REALIZADO_ALUNOS       	H ON A.ENTIDADE = H.ENTIDADE 
									AND E.AC_MATERIAL_PARA_ALUNOS = H.AC_MATERIAL_PARA_ALUNOS
                        LEFT JOIN AC_REALIZADO_ALUNOS_ARQUIVOS  I ON A.ENTIDADE =I.ENTIDADE 
                                                                        AND  I.AC_MATERIAL_PARA_ALUNOS=E.AC_MATERIAL_PARA_ALUNOS

                        WHERE A.AC_MATRICULA=$cod_matricula
                        
                        ORDER BY DATA_REALIZADA
                        ";
                        $smtp = $con->prepare($query);
                        $smtp->execute();
                        $rows = $smtp->fetchAll(PDO::FETCH_OBJ);
                        foreach ($rows as $value) {
                          if ($value->DATA_REALIZADA != '')
                            $rev = date('d/m/Y', strtotime($value->DATA_REALIZADA));
                          else
                            $rev = $value->DATA_REALIZADA;


                          $query2 = "SELECT *
                          FROM AC_REALIZADO_ALUNOS_ARQUIVOS A
                          WHERE A.ENTIDADE =$value->ENTIDADE AND AC_MATERIAL_PARA_ALUNOS=$value->AC_MATERIAL_PARA_ALUNOS";

                          $smtp2 = $con->prepare($query2);
                          $smtp2->execute();

                        ?>

                          <tr <?php
                              echo ($value->AC_CADASTRO_TIPO_MATERIAL == 4 && !$smtp2->rowCount()) ? 'class="bg-primary"' : ($value->AC_CADASTRO_TIPO_MATERIAL == 4 && $smtp2->rowCount()) ? 'class="bg-danger text-white"' : '';
                              ?>>
                            <td class="text-center">
                              <input <?php echo (!empty($rev)) ? 'checked' : ''; ?> prova="<?= $value->AC_MATERIAL_PARA_ALUNOS . '#' . $value->ENTIDADE ?>" type="radio" class="revisou">
                            </td>
                            <td><span class="dataInclusao"><?= $rev ?></span></td>
                            <td><?= date('d/m/Y', strtotime($value->DATA_CADASTRO)); ?></td>
                            <td><?= $value->AC_MATERIAL_PARA_ALUNOS ?></td>
                            <td><?= $value->TEMA_ASSUNTO ?></td>
                            <td><a href="<?= $value->LINK ?>" target="_blank"> <?= $value->DESCRICAO ?> </a></td>
                            <td><?= $value->QTD_HORAS ?></td>
                            <td>
                              <?= $value->TIPO_MATERIAL ?>
                              <?php if ($value->AC_CADASTRO_TIPO_MATERIAL == 4) { ?>

                                <!-- Button trigger modal -->
                                <?php if (!$smtp2->rowCount()) : // Verifica se já foi enviada a atividade
                                ?>
                                  <button type="button" class="btn btn-primary" wm-atividade="<?= $value->AC_MATERIAL_PARA_ALUNOS ?>" wm-responder data-toggle="modal" data-target="#exampleModal">
                                    Responder
                                  </button>
                                <?php else : ?>
                                  <button type="button" class="btn btn-success" wm-atividade="<?= $value->AC_MATERIAL_PARA_ALUNOS ?>" wm-responder data-toggle="modal" data-target="#exampleModal">
                                    Enviado
                                  </button>
                                <?php endif; ?>

                              <?php } ?>
                            </td>
                            <td><a href="<?= $value->LINK_ENVIADO ?>" target="_blank"><?= $value->LINK_ENVIADO ?> </a></td>
                          </tr>

                        <?php
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer text-muted"> <?= date('d/m/Y'); ?> </div>
                </div>

              </div>
            </div>
          </div>

        </div>

      </div>
    </div>





    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Responder atividade</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Corpo do Modal -->
            <form id="upload" method="post" wm-formFile enctype="multipart/form-data">
              <input type="hidden" name="prova" value="">
              <div class="custom-file">
                <input type="file" required name="atividade" wm-resposta class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Selecione o arquivo</label>
              </div>
          </div>
          <div class="modal-footer">
            <progress max="100" value="30"></progress>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" name="prova" wm-enviar class="btn btn-primary">Enviar <div id="carregando" class="d-none spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Carregando...</span>
              </div></button>
          </div>
          </form>
        </div>
      </div>
    </div>

    
    <script>
      function setAtividade() {
        document.querySelectorAll("[wm-responder]").forEach(responder => {
          responder.onclick = function() {
            const atividade = responder.getAttribute("wm-atividade")
            const inputProva = document.querySelector('[name="prova"]')
            inputProva.setAttribute("value", atividade)
          }
        })
      }
      setAtividade()

      function setArquivo() {
        document.querySelector("[wm-resposta]").onchange = function(e) {

          const nomeArquivo = this.files[0].name
          this.nextElementSibling.innerHTML = nomeArquivo
          saveArquivo(this.files[0])
        }
      }
      setArquivo()

      function saveArquivo(arquivo) {
        document.querySelector("[wm-formFile]").addEventListener('submit', function(e) {

          e.preventDefault();
          const carregando = document.getElementById("carregando")
          carregando.classList.remove('d-none')
          const url = 'upload2.php'
          const metodo = 'POST'
          const dados = new FormData(this)
          const prova = dados.get('prova')
          const btnResponder = document.querySelector('[wm-atividade="' + prova + '"]')





          fetch(url, {
              method: metodo,
              body: dados
            })
            .then(function(response) {
              console.log(response.data) 
              return response.text() 
            })
            .then(function(text) {
              console.log(text)
              if (text == 'true') {
                carregando.classList.add('d-none')
                $('#exampleModal').modal('hide')
                btnResponder.classList.remove('btn-primary')
                btnResponder.classList.add('btn-success')
                btnResponder.innerHTML = 'Enviado'
              } else {
                carregando.classList.add('d-none')
                alert('Tipo de arquivo não aceito!')
              }
            })
            .catch(function(erro) {
              console.error(erro)
            })



        })
      }
    </script>

    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
      (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
          new CBPFWTabs(el);
        });

        $(".abrirModal").click(function() {
          var url = $(this).find("img").attr("src");

          $("#myModal img").attr("src", url);
          $("#myModal").modal("show");
        });
      })();
    </script>
    <!--tela para o aluno marcar que ja viu a duvida -->
    <script type="text/javascript">
      (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
          new CBPFWTabs(el);
        });
      })();



      $(function() {
        $('.revisou').click(function() {

          if (confirm('Deseja confirmar que revisou sua Tarefa?')) {

            var prova = $(this).attr('prova');

            if ($(this).is(":checked") == true) {
              $.ajax({
                  url: 'funcoes/tarefa_realizada.php',
                  type: 'POST',
                  data: {
                    prova: prova
                  },
                })
                .done(function(e) {

                  // Atualiza a página
                  location.reload();


                });
            }

          } else {
            $(this).prop('checked', false);
          }
        });
      });
    </script>




</body>

</html>