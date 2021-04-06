<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Flash Upload Test</title>

<? $id= $_GET['id'];?>
<script type="text/javascript" src="http://www.shiguenori.com/jquery/jquery-1.3.1.js"></script>
<script type="text/javascript" src="jquery.fileupload.js"></script>
<script type="text/javascript">
$(document).ready(function() {

   $("#arquivo").fileUpload({
      'uploader': 'uploader.swf',
      'cancelImg': 'cancel.png',
      'folder': 'temp',
      'script': 'upload.php',
      'fileDesc': 'Image Files',
      'fileExt': '*.jpg;*.jpeg;*.gif;*.png',
      'multi': true,
      'auto': true,
      'scriptData' : {'variavel':'alguma-variavel-de-controle'}  
   }); 
});
</script>
<style>
/* CSS PARA ESTILIZAR A BARRA DE PROGRESSO */

.fileUploadQueueItem {
   font: 11px Verdana, Geneva, sans-serif;
   background-color: #F5F5F5;
   border: 3px solid #E5E5E5;
   margin-top: 5px;
   padding: 10px;
   width: 300px;
}
.fileUploadQueueItem .cancel {
   float: right;
}
.fileUploadProgress {
   background-color: #FFFFFF;
   border-top: 1px solid #808080;
   border-left: 1px solid #808080;
   border-right: 1px solid #C5C5C5;
   border-bottom: 1px solid #C5C5C5;
   margin-top: 10px;
   width: 100%;
}
.fileUploadProgressBar {
   background-color: #0099FF;
}
</style>
 
</head>
<body>

<p><input name="arquivo" id="arquivo" type="file" /></p>


 
</body>
</html>