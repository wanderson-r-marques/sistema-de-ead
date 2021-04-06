
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="temp.php" method="post" enctype="multipart/form-data">
<input type="file" name="arq">
<input type="submit" value="foi">
</form>
<?php 

if (isset($_FILES['arq']) || 1 == 1) {                
  // Verificando tipo de arquivo

  echo $tipo_arquivo = mime_content_type($_FILES['arq']['tmp_name']);
}
?>
</body>
</html>