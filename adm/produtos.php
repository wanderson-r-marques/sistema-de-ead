<?php
include "includes/head.php";
include "includes/nav.php"; 

$sql_produtos = mysql_query("SELECT * FROM produtos");

?>

      <ul class="breadcrumb" >
      <li><a href="#">Home</a> <span class="divider">/</span></li>
      <li class="active">Produtos</li>
      </ul>

         <a href="produtoAdd.php" class="btn btn-success" >Adicionar novo <i class="icon-plus icon-white"></i></a><br /><br />

        <table class="table table-bordered">
        <thead>
          <tr>
            <th>IMG</th>
            <th>Nome</th>
            <th>Cor</th>
            <th>Estoque</th>
            <td>Fornecedor</td>
            <td>Categorias</td>
            <th>Action</th>
            <th>Compra</th>

          </tr>

        </thead>
        <tbody>
          <?php   while($linha=mysql_fetch_assoc($sql_produtos)) {  ?>
          <tr>

            <td><img src="uploads/1345884556_images.jpg" width='60' class="img-circle"></td>
            <td><?php echo $linha['nome'];   ?></td>
            <td style="background-color:#<?php echo $linha['cor'];   ?>"></td>
            <td><?php echo $linha['estoque'];   ?></td>
            <td><?php echo $linha['fornec'];   ?></td>
            <td>Categorias</td>
            <td style='width:140px'>

              <a href="" class="btn" ><i class="icon-pencil"></i></a>
              <a href="" class="btn" ><i class=" icon-eye-open"></i></a>
              <a href="" class="btn" ><i class="icon-trash"></i></a>



            </td>
            <td style='width:85px'>
              <form method='post' action='comprar.php'  class='form-inline'  >
                <input type='hidden' name='id' value="<?php echo $linha['id'];   ?>" />

                <div class="input-append">
                  <input class="span2" id="appendedInputButton" size="16" name='qtd' type="text" value='' style='width:30px'><button class="btn" type="submit"><i class="icon-shopping-cart"></i></button>
                </div>
              </form>
            </td>

            <tr>
         <?php  }  ?>
        </tbody>
      </table>

      <div class="pagination">
        <ul>
          <li><a href="#">Prev</a></li>
          <li class="active">
            <a href="#">1</a>
          </li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">Next</a></li>
        </ul>
      </div>

<?php include "includes/foot.php"; ?>