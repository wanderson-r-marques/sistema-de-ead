<?php
include "includes/head.php";
include "includes/nav.php";


function categoriasVarrer($pai)
{
    global $con;

    $sql_categoria = mysql_query("SELECT * FROM categorias WHERE pai='$pai'");

    
    while ($linha=mysql_fetch_assoc($sql_categoria)) { 

        echo "<option value='".$linha['id']."' >".str_repeat("&nbsp;", $linha['nivel']).$linha['nome']."</option>\n";

        categoriasVarrer($linha['id']);
    }
   
}





?>
      <ul class="breadcrumb" >
      <li><a href="#">Home</a> <span class="divider">/</span></li>
      <li><a href="categorias.php">Categorias</a> <span class="divider">/</span></li>
      <li class="active">Adicionar Categoria</li>
      </ul>

 <form class="form-horizontal" action="categoriaCRUD.php" method="post">

  <input type="hidden" name="CRUD" value="C" />

        <fieldset>
          <div class="control-group">
            <label class="control-label" for="input01">Categoria</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="nome" id="input01">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="select01">Categoria pai</label>
            <div class="controls">
              <select id="select01"  name="pai">

                  <option value="0">Sem pai</option>
                  <?php categoriasVarrer(0); ?>

              </select>
            </div>
          </div>
         


          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </fieldset>
      </form>

<?php include "includes/foot.php"; ?>