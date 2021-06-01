<?php
require_once 'valida.php';
$pk = $_POST['pkSerie'];
$arrayEscolas = $_POST['arrayEscolas'];

if (is_numeric($pk)) {
    // Deletar o aluno caso ele tenha saido da turma
    $query = "SELECT 
                b.`pk_turma`,
                b.`DESCRICAO` AS turma  
                FROM series 			  a
                JOIN turmas 			  b ON a.`PK_SERIES` = b.`PK_SERIE`
                JOIN professor_turmas_disciplinas c ON b.`PK_TURMA` = c.`pk_turma` AND b.`PK_ESCOLA` = c.`pk_escola`
                JOIN entidades			  d ON c.`pk_entidade` = d.pk_entidade
                JOIN escolas                      e ON b.`PK_ESCOLA` = e.`PK_ESCOLA`
                WHERE a.`PK_SERIES` = $pk AND b.`PK_ESCOLA` IN ($arrayEscolas)  AND d.`CPF` = ?
                GROUP BY b.`pk_turma`";

    $smtp = $con->prepare($query);
    $smtp->execute([$cpf]);
    if ($smtp->rowCount()) {
        $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
        $html = '<label>Turmas</label><br>';
        foreach ($linhas as $linha) {
            $html .= "
                    <div class='form-check-inline'>
                        <label class='form-check-label'>
                            <input type='checkbox' name='turmas[]' checked wm-inputEscolas class='form-check-input' value='" . $linha->pk_turma . "'>" . $linha->turma . "
                        </label>
                    </div>
                    ";
        }

        echo $html;
    }

}
