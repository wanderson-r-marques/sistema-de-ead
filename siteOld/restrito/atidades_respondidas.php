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



    <title>Professor Online - Sistema de Atividades Curriculares Não Presenciais </title>

</head>

<body>

    <div class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <img class="img-fluid d-block mx-auto" src="../images/site_educao.png">
                    <p class="mb-3 lead teste text-center"><br>Atividades Respondidas pelos Alunos
                    </p>
                    <p class="mb-4 text-center">Seja bem vindo(a) Professor(a): <b><?= $nome_professor; ?></b> </p>
                    <form class="text-left " action="atidades_respondidas.php#tabela" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="token" value="43534gfgfg7f6g-*uyddhgjg">
                        <div class="alert alert-secondary" role="alert">
                            <h4><b>Suas turmas</b>

                            </h4>
                        </div>





                        <label for="disciplina">Escolha a sua Turma?</label>
                        <select onchange="this.form.submit()" name="disciplina" required readonly class="form-control" id="disciplina">
                            <option value="">Selecione a turma para Cadastrar Instruções</option>
                            <?php
                           echo $query = "SELECT 
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
                                        WHERE A.AC_PROFESSOR=$cod_professor";
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
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Data ação</th>
                            <th>Data Pstagem</th>
                            <th>Turma</th>

                            <th>Disciplina</th>
                            <th>Cód. Material</th>
                            <th>Descrição da Ação</th>
                            <th>Tipo da Ação</th>
                            <th>Link da Resposta</th>
                            <th>Responder</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $AC_CADASTRO_DISCIPLINA = $disciplina[0] ?? $value->AC_CADASTRO_DISCIPLINA;
                        $AC_CADASTRO_TURMA = $disciplina[1] ?? $value->AC_CADASTRO_TURMA;

                        echo $disciplina[0];
                        echo $value->AC_CADASTRO_DISCIPLINA;


                        // Select com POST
                        $query = "SELECT 
                        A.ENTIDADE, C.NOME, 
                        CONVERT(A.DATA_HORA,DATE) AS DATA_REALIZACAO,
                        CONVERT(F.DATA_CADASTRO,DATE) AS DATA_POSTADA,
                        D.DESCRICAO AS TURMA,
                        E.DESCRICAO AS DISCIPLINA,
                        F.DESCRICAO AS DESCRICAO_TAREFA,
                        G.DESCRICAO AS TIPO_MATERIAL,
                        A.AC_REALIZADO_ALUNOS_ARQUIVOS,
                        A.LINK, 
                        A.AC_MATERIAL_PARA_ALUNOS 
                        
                        FROM AC_REALIZADO_ALUNOS_ARQUIVOS A 
                        JOIN AC_MATRICULA_DISCIPLINAS     B ON A.ENTIDADE = B.ENTIDADE 
                        JOIN AC_CADASTRO_ALUNOS           C ON A.ENTIDADE = C.ENTIDADE
                        JOIN AC_CADASTRO_CURSOS           D ON B.AC_CADASTRO_TURMA = D.AC_CADASTRO_CURSO
                        JOIN AC_CADASTRO_DISCIPLINAS      E ON B.AC_CADASTRO_DISCIPLINA =E.AC_CADASTRO_DISCIPLINA 
                        JOIN AC_MATERIAL_PARA_ALUNOS      F ON A.AC_MATERIAL_PARA_ALUNOS = F.AC_MATERIAL_PARA_ALUNOS 
                        JOIN AC_CADASTRO_TIPO_MATERIAIS   G ON F.AC_CADASTRO_TIPO_MATERIAL = G.AC_CADASTRO_TIPO_MATERIAL
                 
                        WHERE B.AC_CADASTRO_DISCIPLINA=$AC_CADASTRO_DISCIPLINA 
                        AND B.AC_CADASTRO_TURMA =$AC_CADASTRO_TURMA
                        AND F.AC_PROFESSOR=$cod_professor
                        ORDER BY A.AC_MATERIAL_PARA_ALUNOS, C.NOME DESC";



                        $smtp = $con->prepare($query);
                        $smtp->execute();
                        $rows = $smtp->fetchAll(PDO::FETCH_OBJ);
                        foreach ($rows as $value) {
                        ?>
                            <tr>

                                <td><?= $value->ENTIDADE ?></td>
                                <td><?= $value->NOME ?></td>
                                <td><?= date('d/m/Y', strtotime($value->DATA_REALIZACAO)); ?></td>
                                <td><?= date('d/m/Y', strtotime($value->DATA_POSTADA)); ?></td>

                                <td><?= $value->TURMA ?></td>
                                <td><?= $value->DISCIPLINA ?></td>
                                <td><?= $value->AC_MATERIAL_PARA_ALUNOS ?></td>
                                <td><?= $value->DESCRICAO_TAREFA ?></td>
                                <td><?= $value->TIPO_MATERIAL ?></td>
                                <td><a href="<?= $value->LINK ?>" target="_blank"> <?= $value->LINK ?> </a></td>
                                <td><a href="#" class="text-center" wm-avaliar pk="<?= $value->AC_REALIZADO_ALUNOS_ARQUIVOS ?>" entidade="<?= $value->ENTIDADE ?>" codigo="<?= $value->AC_MATERIAL_PARA_ALUNOS ?>" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-pencil"></i> </a></td>

                            </tr>
                        <?php  } ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Data ação</th>
                            <th>Data Pstagem</th>
                            <th>Turma</th>
                            <th>Disciplina</th>
                            <th>Cód. Material</th>
                            <th>Descrição da Ação</th>
                            <th>Tipo da Ação</th>
                            <th>Link de Tarefa</th>
                            <th>Responder</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Código do Material: <span wm-codMaterial></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <form>
                                <div class="form-group col-2">
                                    <label for="exampleFormControlInput1">Nota</label>
                                    <input type="number" class="form-control" name="nota" id="exampleFormControlInput1">
                                </div>

                                <div class="form-group col-12">
                                    <label for="exampleFormControlTextarea1">Feedback</label>
                                    <textarea class="form-control" name="feedback" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <br><br>
                <div class="modal-footer">
                    <a class="btn btn-danger text-white" data-dismiss="modal" aria-label="Close">Anular</a>
                    <button type="button" class="btn btn-success " wm-btnConfirmar wm-pk wm-entidade id="confirmar">Confirmar</button>

                </div>
            </div>
        </div>
    </div>


    <script>
        $('.data').mask('99/99/9999');
        $('.money').mask('#.##0,00', {
            reverse: true
        });

        // Pegar todos os botões de avaliar
        const avaliars = document.querySelectorAll('[wm-avaliar]').forEach(avaliar => {

            avaliar.addEventListener("click", function() {
                const entidade = this.getAttribute('entidade')
                const pk = this.getAttribute('pk')
                const codigo = this.getAttribute('codigo')
                popup(codigo, pk, entidade)
                enviarResposta(codigo, pk, entidade)
            })

        })

        function popup(codigo, pk, entidade) {
            document.querySelector('[wm-codMaterial]').innerHTML = codigo
            const btnConfirmar = document.querySelector('[wm-btnConfirmar]')
            btnConfirmar.setAttribute("wm-pk", pk)
            btnConfirmar.setAttribute("wm-entidade", entidade)
        }

        function enviarResposta(codigo, pk, entidade) {
            const btnConfirmar = document.querySelector('[wm-btnConfirmar]')
            btnConfirmar.addEventListener("click", function() {
            const inputNota = document.querySelector('input[name = "nota"]')
            const nota = inputNota.value
            const inputFeedback = document.querySelector('textarea[name = "feedback"]')
            const feedback = inputFeedback.value
            

                
                fetch('funcaoResponder.php?nota='+nota+'&pk='+pk+'&feedback='+feedback)
                    .then(function(response) {
                        if(response.ok)
                            $('#exampleModal').hide();
                            alert('Resposta enviada!')
                    })
            })


        }
    </script>

</body>

</html>