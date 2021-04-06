<?php

 $diretorio= $_GET['i'];

$file = $_FILES['Filedata'];

$path     = $file['tmp_name'];
$new_path = $diretorio.$file['name'];

move_uploaded_file($path, $new_path);

echo "1";
?>


