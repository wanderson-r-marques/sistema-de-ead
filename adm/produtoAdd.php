<?php
include "includes/head.php";
include "includes/nav.php";

function categoriasVarrer($pai)
{
    global $con;

    $sql_categoria = mysql_query("SELECT * FROM categorias WHERE pai='$pai'");

    
    while ($linha=mysql_fetch_assoc($sql_categoria)) { 

        echo "<li><input type='checkbox'  name='categoria[]' value='".$linha['id']."' />".str_repeat("&nbsp;&nbsp;", $linha['nivel']).$linha['nome']."</li>";

        categoriasVarrer($linha['id']);
    }
   
}


?>
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
                <ul class="breadcrumb" >
      <li><a href="#">Home</a> <span class="divider">/</span></li>
      <li><a href="produtos.php">Produtos</a> <span class="divider">/</span></li>
      <li class="active">Adicionar Produto</li>
      </ul>

 <form class="form-horizontal" action="produtoCRUD.php" method="post" enctype="multipart/form-data">

  <input type="hidden" name="CRUD" value="C" />

        <fieldset>
          <div class="control-group">
            <label class="control-label" for="input01">Produto</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="nome" id="input01">
            </div>
          </div>

           <div class="control-group">
            <label class="control-label" for="input01">Código</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="cod" id="input01">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="select01">Fornecedor</label>
            <div class="controls">
              <select id="select01"  class="input-xlarge" name="forn">
                <option>Fabricante</option>
                <option value="1" >Havaiana</option>
                <option value="2" >Grendene</option>

              </select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="input01">Valor</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="valor" id="input01">
            </div>
          </div>

           <div class="control-group">
            <label class="control-label" for="input01">Estoque</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="estoque" id="input01">
            </div>
          </div>

           <div class="control-group">
            <label class="control-label" for="input01">Estoque Mínimo</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="estoquemin" id="input01">
            </div>
          </div>

         <div class="control-group">
            <label class="control-label" for="optionsCheckbox">Novo</label>
            <div class="controls">
              <label class="checkbox">
                M <input type="radio" id="optionsCheckbox" value="m" name="sexo" >
                F <input type="radio" id="optionsCheckbox" value="f" name="sexo" >
                U <input type="radio" id="optionsCheckbox" value="u" name="sexo" >
                </label>
            </div>
          </div>


          <div class="control-group">
            <label class="control-label" for="input01">Cor</label>
            <div class="controls">
              <input type="text" class="input-xlarge" name="cor" id="input01" placeholder="#">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="select01">Categoria</label>
            <div class="controls"  style="height:150px;overflow:auto;width:500px;border:1px solid #ccc;list-style:none">
            <ul style="list-style:none" >
              
                <?php categoriasVarrer(0); ?>

              </ul>
            </div>
          </div>


           <div class="control-group">
            <label class="control-label" for="fileInput">Foto</label>
            <div class="controls">
              <input class="input-file" id="fileInput" name="userfile" type="file">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="textarea">Descrição</label>
            <div class="controls">
              <textarea class="input-xxlarge" id="textarea" name="descricao" rows="3"></textarea>
            </div>
          </div>



          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
        </fieldset>
      </form>

<?php include "includes/foot.php"; ?>