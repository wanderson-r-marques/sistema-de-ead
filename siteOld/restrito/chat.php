<!--
  * Wanderson Rodrigues Marques
  * Web Developer
  * https://github.com/wanderson-r-marques
-->

<?php
/*
   * Wanderson Rodrigues Marques
   * Web Developer
   * https://github.com/wanderson-r-marques
*/
require_once("../restrito/conexao.php");
$con = conectar();
?>

<?php
session_start();
$cod_matricula =184323;// $_SESSION['cod_matricula'];
$entidade = 168427; //$_SESSION['entidade'];

//$cod_professor = $_SESSION['ac_professor'];


if ($_POST['token'] == '43534gfgfg7f6g-*uyddhgjg') {

  $duvidas = $_POST['duvidas'];
  $temp = explode('#', $_POST['disciplina']);
  $cod_disciplina = $temp[0];
  $entidade = $temp[1];
  $cod_turma = $temp[2];
  $link = $_POST['link'];

  $query = "INSERT INTO AC_DUVIDAS_ON_LINE 
   (ENTIDADE,
    DATA_HORA,
    AC_CADASTRO_TURMA,
    DUVIDA,
    AC_CADASTRO_DISCIPLINA_2
    ) 
   VALUES ('$entidade', NOW(), '$cod_turma', '$duvidas','$cod_disciplina')";

  $smtp = $con->prepare($query);
  if ($smtp->execute()) {
    echo "<script>alert('Cadastrado com sucesso!');</script>";
  } else {
    echo "<script>alert('Erro ao cadastrar!');</script>";
  }
}



?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap-4.3.1.css">
  <link href="..css/select2.min.css" rel="stylesheet" />
  <link href="..css/style.css" type="text/css" />
  <title>Tira Dúvidas On-Line </title>
  <script src="https://cdn.tiny.cloud/1/aehfllgmvjwqriwoniig6cl9dgo4zmy9eton5fewkcy5atzg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
      tinymce.init({
        selector: '#mytextarea',
        language_url : '../plugins/bower_components/tinymce/pt_BR.js',  // site absolute URL
        language: 'pt_BR'
      });
    </script>

</head>

<body>
  <div class="py-5 " style="background-image: url('images/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="bg-white  mx-auto col-md-12 col-12">
          <img class="img-fluid d-block mx-auto" src="../images/famasul.png">
          <p class="mb-3 lead teste text-center"><br>Cadastro de dúvidas on Line
          </p>
          <p class="mb-4 text-center">Seja bem vindo Aluno(a): <b><?= $nome_professor; ?></b> </p>
          <form class="text-left" action="chat.php" method="post">
            <input type="hidden" name="token" value="43534gfgfg7f6g-*uyddhgjg">
            <div class="alert alert-secondary" role="alert">
              <h4><b>Suas turmas</b></h4>
            </div>




            <div class="form-group col-md-12">
              <label for="disciplina">Escolha a sua Turma?</label>
              <select name="disciplina" readonly class="form-control" id="disciplina">
                <option value="">Selecione a turma para Cadastrar Instruções</option>
                <?php
               $query = "SELECT DISTINCT
                                    A.AC_MATRICULA,
                                    A.AC_CADASTRO_DISCIPLINA,
                                    A.AC_CADASTRO_DISCIPLINA_2 AS COD_DISCPLINA,
                                    B.DESCRICAO AS NOME_DISCIPLINA,
                                    C.AC_PROFESSOR,
                                    D.NOME AS NOME_PROFESSOR,
                                    A.AC_CADASTRO_TURMA,
                                    A.ENTIDADE
                                    
                            FROM AC_MATRICULA_DISCIPLINAS       A 
                            JOIN AC_CADASTRO_DISCIPLINAS        B ON A.AC_CADASTRO_DISCIPLINA_2 = B.AC_CADASTRO_DISCIPLINA
                            JOIN AC_CADASTRO_TURMAS_DISCIPLINAS C ON A.AC_CADASTRO_TURMA = C.AC_CADASTRO_TURMA 
                                                                AND A.AC_CADASTRO_DISCIPLINA_2 = C.AC_CADASTRO_DISCIPLINA
                            LEFT JOIN PESSOAS_FISICAS           D ON C.AC_PROFESSOR = D.ENTIDADE
                            
                            WHERE A.AC_MATRICULA=$cod_matricula ";

                $smtp = $con->prepare($query);
                $smtp->execute();
                $rows = $smtp->fetchAll(PDO::FETCH_OBJ);
                
                foreach ($rows as $key => $value) {
                  echo "<option value='" . $value->COD_DISCPLINA . "#" . $value->ENTIDADE ."#" . $value->AC_CADASTRO_TURMA . "'>" . $value->COD_DISCPLINA . ' - ' . $value->NOME_DISCIPLINA . "</option>";
                }
                ?>
              </select>
            </div>
        </div>
      </div>



      <div class="input m-b-30">
        
        <span class="input"><b>Agora, especifique a sua Dúvida?</b></span>
        <textarea type="text" style="height: 400px" id="mytextarea" name="duvidas"  rows="10" class="form-control" placeholder="Digite a Dúvida"></textarea>
        
      </div>

      
      <br>
      <div class="form-group col-12">
        <input type="submit" id="enviar" class="btn btn-primary btn-block" value="Realizar Cadastro" />
      </div>



      </form>
      <hr>
      <h2>Material cadastrado</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm table-striped">
          <thead>
            <tr>
              <th>Código da Dúvida</th>
              <th>Turma</th>
              <th>Disciplina</th>
              <th>Dúvida</th>
              <th>Resposta</th>
              <th>Link de Resposta</th>

            </tr>
          </thead>
          <tbody>

            <?php
           echo $query = " 
                     SELECT 
                     A.AC_DUVIDAS_ON_LINE,
                     B.DESCRICAO AS TURMA,
                     C.DESCRICAO AS DISCIPLINA,
                     A.DUVIDA,
                     A.RESPOSTA,
                     A.LINK_RESPOSTA
                
                        FROM AC_DUVIDAS_ON_LINE      A
                        JOIN AC_CADASTRO_TURMAS      B ON A.AC_CADASTRO_TURMA = B.AC_CADASTRO_TURMA
                        JOIN AC_CADASTRO_DISCIPLINAS C ON A.AC_CADASTRO_DISCIPLINA_2 = C.AC_CADASTRO_DISCIPLINA
                        WHERE A.ENTIDADE=$entidade
            ";
            $smtp = $con->prepare($query);
            $smtp->execute();
            $rows = $smtp->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $value) {
            ?>

              <tr>
              <td><?= date('d/m/Y', strtotime($value->DATA_CADASTRO)); ?></td>
                <td><?= $value->AC_DUVIDAS_ON_LINE ?></td>
                <td><?= $value->TURMA ?></td>
                <td><?= $value->DISCIPLINA ?></td>
                <td><?= $value->RESPOSTA ?></td>
                <?php if ($linha['LINK'] != '') : ?>
                                            <a class="text-black" style="color: #000000; text-decoration: none;" target="_blank" href="<?= $linha['LINK_RESPOSTA']; ?>" title="">
                                              <?= 'Visualizar Arquivo'; ?>
                                            </a>
                 <?php endif ?>
                


              </tr>

            <?php
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/select2.min.js"></script>
  <script>
    $(function() {
      // Escondendo os cargos de educação
      $('#divEducacao').hide(200);
      // Desabilitando botão de enviar
      $('#enviar').prop("disabled", true);




      // Chama a função de busca dentro do select
      $('.select').select2();



      // Validação do campo deficiência
      $("input[name='portador_deficiencia']").click(function() {
        if ($(this).val() === 'Sim') {
          $('#qual_deficiencia').attr("readonly", false);
          $('#qual_deficiencia').prop("required", true);
        } else {
          $('#qual_deficiencia').attr("readonly", true);
          $('#qual_deficiencia').prop("required", false);
        }
      });

      // Alterando cargos de acordo com o segmento
      $("input[name='segmento']").click(function() {
        if ($(this).val() === 'Saúde') {
          $('#divEducacao').hide(1000, function() {
            $('#divSaude').show(1000, function() {
              $('#cargo_saude').prop('required', true);
              $('#cargo_educacao').prop('required', false);
            });
          });

        } else
        if ($(this).val() === 'Educação') {
          $('#divSaude').hide(1000, function() {
            $('#divEducacao').show(1000, function() {
              $('#cargo_educacao').prop('required', true);
              $('#cargo_saude').prop('required', false);
            });
          });

        }
      });

    });
  </script>

</body>

</html>