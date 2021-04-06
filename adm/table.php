<?php
include "includes/head.php";
include "includes/nav.php";
?>

      <ul class="breadcrumb" >
      <li><a href="#">Home</a> <span class="divider">/</span></li>
      <li class="active">Exemplo de tabela</li>
      </ul>

         <a href="" class="btn btn-success" >Adicionar novo <i class="icon-plus icon-white"></i></a><br /><br />

        <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
              <a href="" class="btn" ><i class="icon-pencil"></i></a>
              <a href="" class="btn" ><i class=" icon-eye-open"></i></a>
              <a href="" class="btn" ><i class="icon-trash"></i></a>
            </td>
          </tr>

          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
              <a href="" class="btn" ><i class="icon-pencil"></i></a>
              <a href="" class="btn" ><i class=" icon-eye-open"></i></a>
              <a href="" class="btn" ><i class="icon-trash"></i></a>
            </td>
          </tr>
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