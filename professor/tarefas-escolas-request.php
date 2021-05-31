<?php
require_once 'valida.php';
$pk = $_POST['pkSerie'];

if (is_numeric($pk)) {
    // Deletar o aluno caso ele tenha saido da turma
    $query = "SELECT d.`PK_ENTIDADE`,
    d.`NOME`,
    a.`PK_SERIES`,
    a.`DESCRICAO` AS serie,
    b.`pk_turma`,
    b.`DESCRICAO` AS turma,
    b.`PK_ESCOLA` AS pkEscola,
    e.`DESCRICAO` AS escola

FROM series 			  a
JOIN turmas 			  b ON a.`PK_SERIES` = b.`PK_SERIE`
JOIN professor_turmas_disciplinas c ON b.`PK_TURMA` = c.`pk_turma` AND b.`PK_ESCOLA` = c.`pk_escola`
JOIN entidades			  d ON c.`pk_entidade` = d.pk_entidade
JOIN escolas                      e ON b.`PK_ESCOLA` = e.`PK_ESCOLA`
WHERE a.`PK_SERIES` = ? GROUP BY b.`PK_ESCOLA`";
    $smtp = $con->prepare($query);
    $smtp->execute([$pk]);
    if ($smtp->rowCount()) {
        $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
        $html = '<label>Escolas</label><br>';
        foreach ($linhas as $linha) {
            $html .= "
                    <div class='form-check-inline'>
                        <label class='form-check-label'>
                            <input type='checkbox' name='escolas[]' wm-inputEscolas class='form-check-input' value='" . $linha->pkEscola . "'>" . $linha->escola . "
                        </label>
                    </div>
                    ";
        }

        echo $html;
    }

}
