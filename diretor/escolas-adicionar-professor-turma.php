<?php require_once 'valida.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title><?= SITE ?> - Aulas EAD </title>
    <link rel="icon" href="<?= FAVICON ?>" />
    <meta charset="utf-8" />
    <meta name="author" content="www.frebsite.nl" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Custom CSS -->
    <link href="../assets/css/styles.css" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="../assets/css/colors.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
</head>

<body class="red-skin">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <?php include_once 'include/header.php' ?>
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        <!-- ============================ Dashboard: My Order Start ================================== -->
        <section class="gray pt-0">
            <div class="container-fluid">

                <!-- Row -->
                <div class="row">

                    <?php include_once 'include/nav.php' ?>

                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <form action="escolas-funcao.php?funcao=professorTurma" method="post">
                            <input type="hidden" name="escola" value="<?= $_GET['escola'] ?>">
                            <input type="hidden" name="professor" value="<?= $_GET['professor'] ?>">
                            <!-- Row -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#">Painel</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Escolas Cadastro</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <!-- /Row -->

                            <!-- Row -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="dashboard_container">
                                        <div class="dashboard_container_header">
                                            <div class="dashboard_fl_1">
                                                <h4>Cadastrar Escola</h4>
                                            </div>
                                        </div>
                                        <div class="dashboard_container_body p-4">

                                            <!-- Basic info -->
                                            <div class="submit-section">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label><b>Disciplina</b></label>
                                                        <select name="disciplina" required wm-estado
                                                            class="form-control">
                                                            <?php
                                                            $query = "SELECT `PK_DISCIPLINAS`, `DESCRICAO` FROM disciplinas 
                                                            ORDER BY DESCRICAO";
                                                            $smtp = $con->prepare($query);
                                                            $smtp->execute();
                                                            $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
                                                            foreach ($linhas as $linha) :
                                                            ?>
                                                            <option value="<?= $linha->PK_DISCIPLINAS ?>">
                                                                <?= $linha->DESCRICAO ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>


                                                    <div class="form-group col-md-12">
                                                        <label><b>Turmas</b></label>
                                                        <br>
                                                        <?php
                                                        $query = "SELECT t.`PK_TURMA`, tu.`DESCRICAO` TURNO, s.`DESCRICAO` SERIE FROM turmas t
JOIN turnos tu ON t.`PK_TURNO` = tu.`PK_TURNO`
JOIN series s ON t.`PK_SERIE` = s.`PK_SERIES`
WHERE t.`PK_ESCOLA` = ?";
                                                        $smtp = $con->prepare($query);
                                                        $smtp->execute([$_GET['escola']]);
                                                        $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
                                                        foreach ($linhas as $linha) :
                                                        ?>
                                                        <input id="tur<?= $linha->PK_TURMA ?>" class="ml-5"
                                                            type="checkbox" name="turmas[]"
                                                            value="<?= $linha->PK_TURMA ?>">
                                                        <label
                                                            for="tur<?= $linha->PK_TURMA ?>"><?= $linha->SERIE . ' - ' . $linha->TURNO ?></label>
                                                        <?php endforeach; ?>

                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label><b>Ano letivo</b></label>
                                                        <select name="anoLetivo" required wm-estado
                                                            class="form-control">
                                                            <?php
                                                            $anoAtual = date('Y');
                                                            for ($i = 0; $i < 4; $i++) {
                                                            ?>
                                                            <option value="<?= $anoAtual + $i ?>">
                                                                <?= $anoAtual + $i ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Basic info -->

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /Row -->

                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="btn btn-theme" type="submit">Salvar escola</button>
                                </div>
                            </div>

                            <!-- Row -->
                            <div class="row mt-4">

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="dashboard_container">

                                        <div class="dashboard_container_body">
                                            <div class="table-responsive">
                                                <h3 class="p-4">Turmas do professor</h3>

                                                <table class="table">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">Série</th>
                                                            <th scope="col">Turma</th>
                                                            <th scope="col">Turno</th>
                                                            <th scope="col">Disciplina</th>
                                                            <th scope="col">Ação</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        // Nova query com as limitações
                                                        $query = "SELECT ptd.`idprofessor_turmas_disciplinas` pk, s.`DESCRICAO` series, t.`DESCRICAO` turma, tu.`DESCRICAO` turno, d.`DESCRICAO` disciplina  FROM professor_turmas_disciplinas ptd
                                                            JOIN turmas t ON ptd.`pk_turma` = t.`PK_TURMA`
                                                            JOIN `disciplinas` d ON ptd.`pk_disciplinas` = d.`PK_DISCIPLINAS`
                                                            JOIN turnos tu ON tu.`PK_TURNO` = t.`PK_TURNO`
                                                            JOIN `series` s ON t.`PK_SERIE` = s.`PK_SERIES`
                                                            WHERE ptd.`pk_entidade` = ?";
                                                        $smtp = $con->prepare($query);
                                                        $smtp->execute([$_GET['professor']]);

                                                        $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
                                                        foreach ($linhas as $linha) {
                                                        ?>
                                                        <tr>
                                                            <td scope="row" wm-lista><?= $linha->series ?></td>
                                                            <td><?= $linha->turma ?></td>
                                                            <td><?= $linha->turno ?></td>
                                                            <td><?= $linha->disciplina ?></td>
                                                            <td>
                                                                <div class="dash_action_link">
                                                                    <a onclick="return confirm('Deseja deletar?')"
                                                                        href="escolas-funcao.php?funcao=deletarTurma&pk=<?= $linha->pk ?>"
                                                                        class="cancel"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                            </td>
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

                    </div>

                </div>
                <!-- Row -->
                </form>
            </div>
        </section>
        <!-- ============================ Dashboard: My Order Start End ================================== -->



        <?php require_once 'include/footer.php' ?>

        <!-- Log In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="registermodal">
                    <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                    <div class="modal-body">
                        <h4 class="modal-header-title">Log In</h4>
                        <div class="login-form">
                            <form>

                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="*******">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                                </div>

                            </form>
                        </div>

                        <div class="social-login mb-3">
                            <ul>
                                <li>
                                    <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                                    <label for="reg" class="checkbox-custom-label">Save Password</label>
                                </li>
                                <li class="right"><a href="#" class="theme-cl">Forget Password?</a></li>
                            </ul>
                        </div>

                        <div class="modal-divider"><span>Or login via</span></div>
                        <div class="social-login ntr mb-3">
                            <ul>
                                <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <p class="mt-2">Haven't Any Account? <a href="register.html" class="link">Click here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Sign Up Modal -->
        <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="sign-up">
                    <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                    <div class="modal-body">
                        <h4 class="modal-header-title">Sign Up</h4>
                        <div class="login-form">
                            <form>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="*******">
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width pop-login">Sign Up</button>
                                </div>

                            </form>
                        </div>

                        <div class="modal-divider"><span>Or Signup via</span></div>
                        <div class="social-login ntr mb-3">
                            <ul>
                                <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#"
                                    class="link">Go For LogIn</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/slick.js"></script>
    <script src="../assets/js/jquery.counterup.min.js"></script>
    <script src="../assets/js/counterup.min.js"></script>
    <script src="../assets/js/jquery.mask.min.js"></script>
    <script src="../assets/js/custom.js"></script>

    <script src="../assets/js/dropzone.js"></script>

    <!-- Date Booking Script -->
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/daterangepicker.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/cep.js"></script>
    <script>
    $('#side-menu').metisMenu();
    </script>

    <script>
    // Course Expire and Start Daterange Script
    $(function() {
        $('input[name="edu-expire"]').daterangepicker({
            singleDatePicker: true,
        });
        $('input[name="edu-expire"]').val('');
        $('input[name="edu-expire"]').attr("placeholder", "Course Expire");
    });
    $(function() {
        $('input[name="edu-start"]').daterangepicker({
            singleDatePicker: true,

        });
        $('input[name="start"]').val('');
        $('input[name="start"]').attr("placeholder", "Course Start");
    });

    cep()
    </script>

</body>

<!-- Mirrored from themezhub.net/learnup-demo-2/learnup/add-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 12:05:45 GMT -->

</html>