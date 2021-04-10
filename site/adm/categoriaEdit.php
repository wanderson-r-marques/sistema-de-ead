<?php
include "includes/head.php";
include "includes/nav.php";

$id = $_GET['id'];

$sel_categoria = mysql_query("SELECT * FROM categorias WHERE id='$id'");
$linha = mysql_fetch_assoc($sel_categoria);

$id_pai = $linha['pai'];
$nivel_pai = $linha['nivel'];

function categoriasVarrer($pai,$id_pai)
{
    global $con;
     global $id;
    $sql_categoria = mysql_query("SELECT * FROM categorias WHERE pai='$pai'");

    
    while ($linha=mysql_fetch_assoc($sql_categoria)) { 

        //Detecto a categoria para deixala selecionada

        if($id_pai==$linha['id']) { $selected=' selected="selected "';} else {$selected='';}

        if($id!=$linha['id']){


            echo "<option value='".$linha['id']."'".$selected." >".str_repeat("&nbsp;", $linha['nivel']).$linha['nome']."</option>\n";

           categoriasVarrer($linha['id'],$id_pai);

          }

 
    }
   
}






?>
      <ul class="breadcrumb" >
      <li><a href="#">Home</a> <span class="divider">/</span></li>
      <li><a href="categorias.php">Categorias</a> <span class="divider">/</span></li>
      <li class="active">Editar Categoria</li>
      </ul>

 <form class="form-horizontal" action="categoriaCRUD.php" method="post">

  <input type="hidden" name="CRUD" value="U" />
  <input type="hidden" name="id_categoria" value="<?php echo $linha['id'];    ?>" />

        <fieldset>
          <div class="control-group">
            <label class="control-label" for="input01">Categoria</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="nome" value="<?php  echo $linha['nome'];  ?>" id="input01">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="select01">Categoria pai</label>
            <div class="controls">
              <select id="select01"  name="pai" <?php  if($id==1){ echo "disabled='disabled'"; }  ?>  >

                  <option value="0">Sem pai</option>

                  <?php categoriasVarrer(0,$id_pai); ?>

              </select>
            </div>
          </div>
         


          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </fieldset>
      </form>

<?php include "includes/foot.php"; ?>