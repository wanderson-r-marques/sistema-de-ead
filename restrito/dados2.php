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

// Inicializando variavel de alerta
//$alerta = '';

//if ($_POST['enviar'] == 'Enviar documentos' && $_POST['token'] == '8dft7gdf6g&¨8FDFD') {

//require_once("../includes/config.php");


// Cria a pasta de documentos do usuario
// $local = '../documentos/' . $atributo->candidado . '/';

// mkdir($local, 0775, true);



// Enviando RG
// if ($_FILES['doc_rg']['name'] != NULL) {
//  $arquivo = $_FILES['doc_rg'];
// $nome_arquivo = $local . 'doc_rg';
//$enviado = enviar_arquivo($arquivo, $nome_arquivo);
//   if ($enviado) {
//     $query = "UPDATE Candidatos SET doc_rg = :doc WHERE candidado = :candidado";
//    $db = $con->prepare($query);
//   $db->bindParam(':doc', $enviado, PDO::PARAM_STR);
//    $db->bindParam(':candidado', $atributo->candidado, PDO::PARAM_INT);
//    $db->execute();
//    $alerta .= '<div class="alert alert-success">O <b>RG</b> foi enviado com sucesso!</div>';
//  } else {
//    $alerta .= '<div class="alert alert-danger">O <b>RG</b> não foi enviado, verifique o formato do arquivo.';
//  }
// }


?>

<?php
$nome_professor = $_SESSION['nome'];
$cod_professor = $_SESSION['ac_professor'];


if ($_POST['token'] == '43534gfgfg7f6g-*uyddhgjg') {

  $temp = explode('#', $_POST['disciplina']);
  $cod_disciplina = $temp[0];
  $cod_turma = $temp[1];
  $mensagem = $_POST['descricao'];
  $qtd_horas = $_POST['qtd_horas'];
  $material = $_POST['material'];
  $data_hora = date('Y-m-d H:i:s');

  $link = $_POST['link'];


  $query = "INSERT INTO AC_MATERIAL_PARA_ALUNOS (
		DESCRICAO,
		AC_CADASTRO_DISCIPLINA_2,
    AC_CADASTRO_TURMA,
    ANO_LETIVO,
    AC_PROFESSOR,
		LINK,
    AC_CADASTRO_TIPO_MATERIAL,
    DATA_CADASTRO,
    QTD_HORAS
     )
	   VALUES ('$mensagem','$cod_disciplina','$cod_turma','20201','$cod_professor','$link','$material',now(),'$qtd_horas'  )";

  $smtp = $con->prepare($query);
  if ($smtp->execute()) {

    // Verifica se existe arquivo 
    if ($_FILES['arquivo']) {

      function slugify($string)
      {

        $table = array(
          'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
          'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
          'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
          'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
          'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
          'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
          'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
          'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r', '/' => '-', ' ' => '-'
        );

        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

        // -- Returns the slug
        return strtolower(strtr($string, $table));
      }


      $pk = $con->lastInsertId();
      $slug =  slugify($_FILES['arquivo']['name']);
      $caminho = '../arquivos/' . $pk . '_' . addslashes($slug);
      if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho)) {
        $query = "UPDATE AC_MATERIAL_PARA_ALUNOS SET LINK = '$caminho' WHERE AC_MATERIAL_PARA_ALUNOS = $pk";
        $smtp = $con->prepare($query);
        $smtp->execute();
      }
    }



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
  <title>Professor Online - Sistema de Atividades Curriculares Não Presenciais </title>

</head>

<body>
  <div class="py-5 " style="background-image: url('images/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="bg-white  mx-auto col-md-12 col-12">
          <img class="img-fluid d-block mx-auto" src="../images/famasul.jpeg">
          <p class="mb-3 lead teste text-center"><br>Cadastro para Aulas e Atividades dos Alunos
          </p>
          <p class="mb-4 text-center">Seja bem vindo Professor(a): <b><?= $nome_professor; ?></b> </p>
          <form class="text-left" action="dados.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="token" value="43534gfgfg7f6g-*uyddhgjg">
            <div class="alert alert-secondary" role="alert">
              <div class="btn-group" style="float:right">
                <a href="frequencia_aluno.php" target="_blank" class="btn btn-primary">Freq. Aluno na plataforma</a>
                <a href="atividades_entregues.php" target="_blank" class="btn btn-primary">Ações Realizadas </a>
                <a href="logout2.php" class="btn btn-primary">Sair</a>
              </div>
              <h4><b>Suas turmas</b></h4>

            </div>




            <div class="form-group col-md-12">
              <label for="disciplina">Escolha a sua Turma?</label>
              <select name="disciplina" required readonly class="form-control" id="disciplina">
                <option value="">Selecione a turma para Cadastrar Instruções</option>
                <?php
                $query = "SELECT DISTINCT 
                                  E.DESCRICAO AS TURMA, 
                                  A.AC_CADASTRO_DISCIPLINA_2,
                                  B.DESCRICAO,
                                  C.AC_PROFESSOR,
                                  D.NOME,
                                  A.AC_CADASTRO_TURMA,
                                  E.DESCRICAO AS NOME_TURMA
                            FROM VW_PROFESSOR_TURMA             A 
                            JOIN AC_CADASTRO_DISCIPLINAS        B ON A.AC_CADASTRO_DISCIPLINA_2 = B.AC_CADASTRO_DISCIPLINA
                            JOIN AC_CADASTRO_TURMAS_DISCIPLINAS C ON A.AC_CADASTRO_TURMA = C.AC_CADASTRO_TURMA 
                                                                AND A.AC_CADASTRO_DISCIPLINA_2 = C.AC_CADASTRO_DISCIPLINA
                            LEFT JOIN PESSOAS_FISICAS           D ON C.AC_PROFESSOR = D.ENTIDADE
                            JOIN AC_CADASTRO_TURMAS             E ON A.AC_CADASTRO_TURMA = E.AC_CADASTRO_TURMA
                          
                            
                            WHERE C.AC_PROFESSOR=$cod_professor
                            ORDER BY E.DESCRICAO
                  
                  ";
                $smtp = $con->prepare($query);
                $smtp->execute();
                $rows = $smtp->fetchAll(PDO::FETCH_OBJ);
                foreach ($rows as $key => $value) {
                  echo "<option value='" . $value->AC_CADASTRO_DISCIPLINA_2 . "#" . $value->AC_CADASTRO_TURMA . "'>" . $value->TURMA . ' - ' . $value->DESCRICAO . "</option>";
                }
                ?>
              </select>
            </div>
        </div>
      </div>



      <div class="form-group col-12">
        <label for="nome">Descrição do Material</label>
        <input type="text" required class="form-control" name="descricao" id="nome" placeholder="">
      </div>

      <div class="form-group col-12">
        <label for="nome">Quantidade de Horas para essa Atividade ex: 3, não colocar abreviatura hs, usar . para decimal </label>
        <input type="text" required class="form-control" name="qtd_horas" id="nome" placeholder="">
      </div>

      <div class="form-group col-12">
        <label for="tipo_material">Escolha o tipo de Material?</label>
        <select name="material" class="form-control" id="tipo_material">
          <option value="">Selecione o Tipo de Material que vai ser Enviado</option>
          <?php
          $query = " SELECT *  FROM AC_CADASTRO_TIPO_MATERIAIS ORDER BY DESCRICAO";
          $smtp = $con->prepare($query);
          $smtp->execute();
          $rows = $smtp->fetchAll(PDO::FETCH_OBJ);
          foreach ($rows as $value) {
            echo '<option value="' . $value->AC_CADASTRO_TIPO_MATERIAL . '">' . $value->DESCRICAO . '</option>';
          }
          ?>
        </select>
      </div>
      <br>
      <div class="form-group col-12">
        <label for="arquivo">Tipo de postagem: </label>
        <div class="form-check form-check-inline">
          <input class="form-check-input tipo_postagem" checked type="radio" name="tipo_postagem" id="tipo_postagem_link" value="link">
          <label class="form-check-label" for="tipo_postagem_link">Link</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input tipo_postagem" type="radio" name="tipo_postagem" id="tipo_postagem_arquivo" value="arquivo">
          <label class="form-check-label" for="tipo_postagem_arquivo">Arquivo</label>
        </div>
      </div>

      <div class="form-group col-12" id="link">
        <label for="link">Link do material:</label>
        <input type="text" name="link" class="form-control" placeholder="">
      </div>

      <div class="form-group col-12" id="arquivo">
        <label for="arquivo">Arquivo do material:</label>
        <input type="file" name="arquivo" class="form-control" placeholder="">
      </div>

      <br>
      <div class="form-group col-12">
        <input type="submit" id="enviar" class="btn btn-primary" value="Realizar Cadastro" />
      </div>



      </form>
      <hr>
      <h2>Material cadastrado</h2>
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm table-striped">
          <thead>
            <tr>
              <th>Data Cadastro</th>
              <th>Descrição do Material</th>
              <th>Turma</th>
              <th>Disciplina</th>
              <th>Carg. Hora</th>
              <th>Tipo Material</th>
              <th>link</th>

            </tr>
          </thead>
          <tbody>

            <?php
            $query = " 
                  SELECT 
                        F.DESCRICAO AS TURMA,
                        E.AC_PROFESSOR,
                        E.AC_CADASTRO_TIPO_MATERIAL,
                        G.DESCRICAO AS TIPO_MATERIAL,
                        E.LINK,
                        E.AC_MATERIAL_PARA_ALUNOS,
                        E.DESCRICAO,
                        H.DESCRICAO AS DISCIPLINA,
                        E.DATA_CADASTRO AS DATA_CADASTRO,
                        E.QTD_HORAS
 
                FROM AC_MATERIAL_PARA_ALUNOS        E 
                JOIN AC_CADASTRO_TURMAS             F ON E.AC_CADASTRO_TURMA = F.AC_CADASTRO_TURMA
                JOIN AC_CADASTRO_TIPO_MATERIAIS     G ON E.AC_CADASTRO_TIPO_MATERIAL = G.AC_CADASTRO_TIPO_MATERIAL
                JOIN AC_CADASTRO_DISCIPLINAS       H ON E.AC_CADASTRO_DISCIPLINA_2 = H.AC_CADASTRO_DISCIPLINA
                
                WHERE E.AC_PROFESSOR=$cod_professor
                ORDER BY E.AC_MATERIAL_PARA_ALUNOS

            ";
            $smtp = $con->prepare($query);
            $smtp->execute();
            $rows = $smtp->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $value) {
            ?>

              <tr>
                <td><?= date('d/m/Y', strtotime($value->DATA_CADASTRO)); ?></td>
                <td><?= $value->DESCRICAO ?></td>
                <td><?= $value->TURMA ?></td>
                <td><?= $value->DISCIPLINA ?></td>
                <td><?= $value->QTD_HORAS ?></td>

                <td><?= $value->TIPO_MATERIAL ?></td>
                <td><?= $value->LINK ?></td>


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
      $('#arquivo').hide(0);
      $(".tipo_postagem").click(function() {

        if (this.value == 'link') {
          $('#arquivo').hide(500, function() {
            $('#link').show(500).attr('required', "true");
          }).attr("required", "false");
        } else if (this.value == 'arquivo') {
          $('#link').hide(500, function() {
            $('#arquivo').show(500).attr("required", "true");
          }).attr("required", "false");
        } else {
          alert('erro')
        }

      });

      // Escondendo os cargos de educação
      $('#divEducacao').hide(200);
      // Desabilitando botão de enviar





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